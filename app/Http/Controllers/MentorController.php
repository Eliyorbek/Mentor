<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentors = Mentor::all();
        return view('dashboard.mentor.teacher' , compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.mentor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image' => 'required|mimes:png,jpg,jpeg,svg,gid|max:4096',
            'binifits'=> 'required'
        ]);
        $imgName = md5(rand(1111,9999) . microtime()) .'.'.$request->file('image')->extension();
        Mentor::create([
            'name' => $request->name,
            'image' => $imgName,
            'social' => ['telegram' => $request->telegram , 'facebook'=> $request->facebook , 'instagram' => $request->instagram , 'youtube' => $request->youtube],
            'binifits' => $request->binifits,
        ]);
        $request->file('image')->storeAs('public/mentor_img' , $imgName);
        return redirect()->route('mentor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function show(Mentor $mentor)
    {
        return view('dashboard.mentor.show', compact('mentor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function edit(Mentor $mentor)
    {
        return view('dashboard.mentor.edit' , compact('mentor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mentor $mentor)
    {
        $request->validate([
            'name'=>'required',
            'binifits' => 'required',
        ]);
        if($request->hasFile('image')){
            $imgName = md5(rand(1111,9999). microtime()).'.'.$request->file('image')->extension();
            Storage::delete('public/mentor_img/'.$mentor->image);
        }else{
            $imgName = $mentor->image;
        }
        $mentor->update([
            'name' => $request->name,
            'image' => $imgName,
            'social' => ['telegram' => $request->telegram , 'facebook'=> $request->facebook , 'instagram' => $request->instagram , 'youtube' => $request->youtube],
            'binifits' => $request->binifits
        ]);
        if($request->hasFile('image')){
            $request->file('image')->store('public/mentor_img' , $imgName);
        }
        return redirect()->route('mentor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mentor $mentor)
    {
        Storage::delete('public/mentor_img/'.$mentor->image);
        $mentor->delete();
        return redirect()->route('mentor.index');
    }
}


