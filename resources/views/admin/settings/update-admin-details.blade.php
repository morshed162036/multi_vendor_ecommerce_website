@extends('admin.layout.layout')

@section('main-content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Settings</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Admin Details</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error: </strong>{{ Session::get('error') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                @if(Session::has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success: </strong>{{ Session::get('success') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                <form class="forms-sample" action="{{ route('admin.update-details') }}" method="post" enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label>Admin Username/Email</label>
                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly>
                </div>
                <div class="form-group">
                    <label>Admin Type</label>
                    <input  class="form-control" value="{{ Auth::guard('admin')->user()->type }}" readonly>
                </div>
                <div class="form-group">
                    <label for="admin_name">Admin Name</label>
                    <input type="text" class="form-control" id="admin_name" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter valid name" name="admin_name" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="admin_mobile">Admin Mobile</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary text-white">+880</span>
                      </div>
                      <input type="text" class="form-control" id="admin_mobile" value="{{ Auth::guard('admin')->user()->mobile}}" placeholder="Enter 10 digit Mobile Number" name="admin_mobile" required maxlength="10" minlength="10">
                    </div>
                </div>
                <div class="form-group">
                      <label>Admin Photo</label>
                      <input type="file" id="admin_image" name="admin_image" class="form-control">
                      {{-- <div class="input-group">
                          <span class="input-group-append">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <label for="admin_image" class="btn btn-primary">Upload</label>
                        </span>
                      </div> --}}
                      @if (!empty(Auth::guard('admin')->user()->image))
                      <a href="{{ url('admin/images/profilepic/'.Auth::guard('admin')->user()->image) }}"> View Image</a>
                      <input type="hidden" name="current_admin_image" value="{{ Auth::guard('admin')->user()->image }}">
                          
                      @endif
                </div>
                
                
                <button type="submit" class="btn btn-primary mt-3">Update</button>
                {{-- <a onclick="clearImage()" class="btn btn-primary mt-3">Clear</a> --}}

                </form>
            </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
