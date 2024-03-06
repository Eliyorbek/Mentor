@extends('dashboard.inc.app')
@section('content')
<div class="card p-3">
    <div class="card-header">
      <h3  class="card-title mt-2">All Mentor</h3>
      <a href="{{route('mentor.create')}}" class="btn btn-primary float-right">Add New </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">Id</th>
            <th style="width: 10px">Image</th>
            <th style="width: 10px">Name</th>
            <th style="width: 10px">Action</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($mentors as $mentor)
          <tr>
            <td>{{$mentor->id}}</td>
            <td><img src="{{'/storage/mentor_img/'.$mentor->image}}" style="width: 100px"></td>
            <td>{{$mentor->name}}</td>
            <td>
              <div class="btn-group">
                <a href="{{route('mentor.edit' , $mentor->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                <a href="{{route('mentor.show' , $mentor->id)}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                <form action="{{route('mentor.destroy' , $mentor->id)}}" method="post">
                @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" style="border-radius: 0 5px 5px 0"><i class="fa fa-trash"></i></button>
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