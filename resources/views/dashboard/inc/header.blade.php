<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tojimatov Eliyorbek</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="/adminpanel/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminpanel/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="/adminpanel/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
        
          <!-- Messages Dropdown Menu -->
         
          
            <div class="dropdown " style="margin-right:60px;">
              @guest
                @else
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                  <button class="btn btn-secondary dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="font-medium text-base ">{{ Auth::user()->name }}</div>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <x-responsive-nav-link :href="route('logout')"
                                      onclick="event.preventDefault();
                                                  this.closest('form').submit();">
                                  {{ __('Log Out') }}
                              </x-responsive-nav-link>
                          </form>
                      </a></li>
                    
                  </ul>
              </div>
            @endguest
            </div>
        </ul>
      </nav>
      <!-- /.navbar -->
    
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
          {{-- <img src="/adminpanel/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
          &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-cart-shopping"></i> 
          <span class="brand-text font-weight-light">Shopper</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
              &nbsp;<i class="fa-solid fa-user-tie" style="color: rgb(199, 199, 199); font-size:25px;"></i>
              {{-- <img src="/adminpanel/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
              <a href="#" style="font-size:20px;" class="d-block">Eliyorbek Tojimatov</a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <ul class="nav nav-treeview">
             
                  <li class="nav-item">
                    <a href="{{route('setting.index')}}" class="nav-link">
                      <i class="fa-solid fa-gear"></i>&nbsp;&nbsp;
                      <p>Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('mentor.index')}}" class="nav-link">
                      <i class="fa-solid fa-user"></i>&nbsp;&nbsp;
                      <p>Mentors</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
       <div class="content-wrapper">
  
        
       
      