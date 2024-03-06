@extends('dashboard.inc.app')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-10 offset-1 mt-2">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Mentor</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('mentor.update' , $mentor->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Fullnama" value="{{$mentor->name}}" class="form-control" id="">
              </div>
              <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="image" placeholder="Image" class="form-control" id="">
              </div>
              <div class="form-group">
                <label for="social">Social</label>
                <input type="text" name="telegram" placeholder="Telegram" value="{{$mentor->social['telegram']}}" class="form-control" id="">
                <input type="text" name="instagram" placeholder="Instagram" value="{{$mentor->social['instagram']}}" class="form-control" id="">
                <input type="text" name="facebook" placeholder="Facebook" value="{{$mentor->social['facebook']}}" class="form-control" id="">
                <input type="text" name="youtube" placeholder="You tube" value="{{$mentor->social['youtube']}}" class="form-control" id="">
              </div>
              <div class="form-group">
                <label for="benifits">Benifits</label>
                @foreach ($mentor->binifits as $benifit)
                <input type="text" name="binifits[]" value="{{old('name' , $benifit)}}" class="form-control" id="benifit_" placeholder="benifits_">
                @endforeach
                <div class="new">
                  <div id="input_js">
                    @foreach ($mentor->binifits as $binifit)
                    <input type="hidden">
                    @endforeach
                  </div>
                  <div id="cencel">
                  </div>
                </div>
                <button type="button" id="plus" class="btn btn-success">+</button>
              </div>
            </div>
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    var plus = document.querySelector('#plus');
    var input = document.querySelector('#input_js');
    var cencel = document.querySelector('#cencel');
    let benifit = document.querySelectorAll('#benifit_');
    let count = {{count($mentor->binifits)}};
    plus.addEventListener('click' , ()=>{
      let newinput = document.createElement('input');
      newinput.setAttribute('type' , 'text');
      newinput.setAttribute('name' , 'binifits[]');
      newinput.setAttribute('class' , 'form-control');
      newinput.setAttribute('placeholder' , 'benifit_'+ count++);
      input.appendChild(newinput);

      let newcencel = document.createElement('button');
      newcencel.type = 'button';
      newcencel.className="btn btn-danger";
      newcencel.innerText = 'X';

      newcencel.addEventListener('click' , ()=>{
        input.removeChild(newinput);
        cencel.removeChild(newcencel);
      })

      input.appendChild(newinput);
      cencel.appendChild(newcencel);
    });

  </script>
  <style>
    #input_js{
      width: 95%;
    }
    .new{
      display: flex;
      width: 100%;
    }
    #cencel{
      width: 5%;
    }
    #benifit_{
      width: 95%;
    }
  </style>
@endsection