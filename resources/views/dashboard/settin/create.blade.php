@extends('dashboard.inc.app')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-10 offset-1 mt-2">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create Setting</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('setting.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
            <div class="form-group">
                <input type="file" name="image" placeholder="Image" class="form-control" id="">
            </div>
            <div class="form-group">
                <input type="number" name="phone" placeholder="Phone" class="form-control" id="">
            </div>
            {{-- <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control" id="">
            </div> --}}
            <div class="form-group">
                <input type="text" name="location" placeholder="Location" class="form-control" id="">
            </div>
            </div>
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection