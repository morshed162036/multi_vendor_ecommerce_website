@extends('admin.layout.layout')

@section('main-content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Catalogue Management</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $title }}</h4>
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
                <form class="forms-sample" action="
                @if (empty($section['id']))
                    {{ url('admin/section-add-edit') }}
                @else
                   {{ url('admin/section-add-edit/'.$section['id']) }} 
                @endif" method="post" enctype="multipart/form-data"> @csrf
                
                <div class="form-group">
                    <label for="section_name">Section Name</label>
                    <input type="text" class="form-control" id="section_name" @if (!empty($section['name']))
                        value="{{ $section['name'] }}"
                    
                    @endif placeholder="Enter valid name" name="section_name" required>
                </div>  
                
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                {{-- <a onclick="clearImage()" class="btn btn-primary mt-3">Clear</a> --}}

                </form>
            </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
