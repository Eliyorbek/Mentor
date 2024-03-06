<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::all();
        return view('dashboard.settin.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.settin.create');
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
            'image' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'location' => 'required'
        ]);
        $imgName = md5(rand(1111,9999) . microtime()) . '.' . $request->file('image')->extension();
        Settings::create([
            'image' => $imgName,
            'phone' => $request->phone,
            'location' => $request->location
        ]);
        $request->file('image')->storeAs('public/set_img' , $imgName);
        return redirect()->route('setting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $setting)
    {
        return redirect()->route('setting.show' , compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $setting)
    {
        return view('dashboard.settin.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $setting)
    {
        $request->validate([
            'phone' => 'required',
            'location' => 'required',
        ]);
        if($request->hasFile('image')){
            $imgName = md5(rand(1111,9999). microtime()). '.'. $request->file('image')->extension();
            if('storage/set_img/'.$setting->image){
                unlink('storage/set_img/'.$setting->image);
            }
        }else{
            $imgName = $setting->image;
        }
        $setting->update([
            'phone' => $request->phone,
            'location' => $request->location,
            'email' => $request->email,
            'image' => $imgName
        ]);
        return redirect()->route('setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $setting)
    {
        if('storage/set_img/'.$setting->image){
            unlink('storage/set_img/'.$setting->image);
        }
        $setting->delete();
        return redirect()->route('setting.index');
        
    }
}
