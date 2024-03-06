@extends('dashboard.inc.app')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-10 offset-1 mt-2">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create Mentor</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('mentor.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Fullnama" class="form-control" id="">
              </div>
              <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="image" placeholder="Image" class="form-control" id="">
              </div>
              <div class="form-group">
                <label for="social">Social</label>
                <input type="text" name="telegram" placeholder="Telegram" class="form-control" id="">
                <input type="text" name="instagram" placeholder="Instagram" class="form-control" id="">
                <input type="text" name="facebook" placeholder="Facebook" class="form-control" id="">
                <input type="text" name="youtube" placeholder="You tube" class="form-control" id="">
              </div>
              <div class="form-group">
                <label for="benifits">Benifits</label>
                <input type="text" name="binifits[]" class="form-control" id="benifit_" placeholder="benifits_">
                <div class="new">
                  <div id="input_js">
                  <input type="hidden" name="" id="">
                  </div>
                  <div id="cencel">
                  </div>
                </div>
                <button type="button" id="plus" class="btn btn-success">+</button>
              </div>
            </div>
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Buttun</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    var plus = document.querySelector('#plus');
    var input = document.querySelector('#input_js');
    var cencel = document.querySelector('#cencel');
    let benifit = document.querySelectorAll('#benifit_' + 1);
    let count = 1;
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