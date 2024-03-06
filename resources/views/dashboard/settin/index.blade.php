@extends('dashboard.inc.app')
@section('content')
<div class="card p-3">
    <div class="card-header">
      <h3  class="card-title mt-2">All Settings</h3>
      <a href="{{route('setting.create')}}" class="btn btn-primary float-right">Add New </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">Id</th>
            <th style="width: 10px">Image</th>
            <th style="width: 10px">Phone</th>
            <th style="width: 10px">Location</th>
            <th style="width: 10px">Actions</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($settings as $setting)
          <tr>
            <td>{{$setting->id}}</td>
            <td><img src="{{'/storage/set_img/'.$setting->image}}" style="width: 100px"></td>
            <td>{{$setting->phone}}</td>
            <td>{{substr($setting->location , 0 ,50)}}</td>
            <td>
              <div class="btn-group">
                <a href="{{route('setting.edit' , $setting->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                <form action="{{route('setting.destroy' , $setting->id)}}" method="post">
                @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
              </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <ul class="pagination pagination-sm m-0 float-right">
       
      </ul>
    </div>
  </div>
@endsection