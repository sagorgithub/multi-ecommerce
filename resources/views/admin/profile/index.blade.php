@extends('layouts.dashbord_app')


@section('Title')
Profile
@endsection


@section('dashbord_content')
 <!--start main wrapper-->
 <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Components</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
          <div class="btn-group">
            <button type="button" class="btn btn-primary">Settings</button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
              <a class="dropdown-item" href="javascript:;">Another action</a>
              <a class="dropdown-item" href="javascript:;">Something else here</a>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="javascript:;">Separated link</a>
            </div>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            Name Edite
                        </div>
                        <div class="card-body">
                            @if (session('name_change_stutas'))
                                <div class="alert alert-success">
                                    {{ session('name_change_stutas') }}
                                </div>
                            @endif

                            @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            <form action="{{ url('edit/profile/post') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Enter New Name" name="name" value="{{ Auth::user()->name }}">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Change Name</button>
                            </form>
                        </div>
                    </div>
                </div>

                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                Profile Photo Chenge
                            </div>
                            <div class="card-body">
                                @if ($errors->all())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error):
                                          <li>{{$error}}</li>
                                        @endforeach
                                    </div>
                                @endif
                                <form action="{{ url('chenge/profile/photo') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                      <label>Profile Photo Chenge</label>
                                      <input type="file" class="form-control" name="profile_photo" onchange="readURL(this);">
                                      <img class="hidden" id="tenant_photo_viewer" src="#" alt="your image" />
                                      <style media="screen">
                                        .hidden{
                                          display: none;
                                        }
                                      </style>
                                       <script>
                                       function readURL(input) {
                                         if (input.files && input.files[0]) {
                                           var reader = new FileReader();
                                           reader.onload = function (e) {
                                             $('#tenant_photo_viewer').attr('src', e.target.result).width(150).height(195);
                                           };
                                           $('#tenant_photo_viewer').removeClass('hidden');
                                           reader.readAsDataURL(input.files[0]);
                                         }
                                       }
                                       </script>
                                    </div>
                                    <button type="submit" class="btn btn-info mt-3">Change Name</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4 m-auto">
                    <div class="card mb-3">
                        <div class="card-header">
                            Change Password
                        </div>
                        <div class="card-body">
                            @error('password')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            @if (session('password_error'))
                                <div class="alert alert-danger">
                                    {{ session('password_error') }}
                                </div>
                            @endif
                            <form action="{{ url('edit/password') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                <label>Old Password</label>
                                <input type="password" class="form-control" placeholder="Enter Old Name" name="old_password" id="ps">
                                </div>
                                <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control" placeholder="Enter New Password" name="password" id="ps">
                                </div>
                                <div class="form-group">
                                <label>Confim Password</label>
                                <input type="password" class="form-control" placeholder="Enter Confirmed Password" name="password_confirmation" id="ps">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Change Password</button>
                                <!-- An element to toggle between password visibility -->
                                <br>
                                {{-- <input type="checkbox" onclick="passwordShow()"> --}}
                                {{-- <script>
                                    function passwordShow() {
                                        var x = document.getElementById("ps");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
                                </script> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
