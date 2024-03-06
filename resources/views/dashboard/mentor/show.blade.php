@extends('dashboard.inc.app')
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-header ">
                <h1 >{{$mentor->name}}</h1>
                
            </div>
            <div class="card-bady p-2">
                <ul>
                    <li><a href="{{$mentor->social['telegram']}}">Telegram</a></li>
                    <li><a href="{{$mentor->social['instagram']}}">Instagram</a></li>
                    <li><a href="{{$mentor->social['facebook']}}">Facebook</a></li>
                    <li><a href="{{$mentor->social['youtube']}}">You tube</a></li>
                </ul>
                <div class="img-fluit">
                    <img src="{{'/storage/mentor_img/'.$mentor->image}}" style="width: 500px ; height:500px;padding:15px;" alt=""><br>
                    <div class="date">{{$mentor->created_at->format('h')}} hours ago</div>
                </div>
                <div class="benifit">
                    <ul>
                    @foreach ($mentor->binifits as $binifit)
                        <li>{{$binifit}}</li>
                    @endforeach
                    </ul>
                </div>
                <a href="{{route('mentor.index')}}" class="btn btn-primary ">Back</a>
            </div>
        </div>
    </div>
    <style>
        .date{
            margin-left: 20px;
            padding: 10px;
            border: 1px solid #c3c3c3;
            width: 120px;
            border-radius: 10px;
            box-shadow: 0 0 3px 3px #c3c3c3;
            margin-bottom: 20px;
        }
    </style>
@endsection