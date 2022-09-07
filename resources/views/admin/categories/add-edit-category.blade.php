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
                @if (empty($category['id']))
                    {{ url('admin/category-add-edit') }}
                @else
                   {{ url('admin/category-add-edit/'.$category['id']) }} 
                @endif" method="post" enctype="multipart/form-data"> @csrf
                
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" id="category_name" 
                    @if (!empty($category['category_name']))
                        value="{{ $category['category_name'] }}"
                    @endif 
                    placeholder="Enter valid name" name="category_name" required>
                </div>  
                <div class="form-group">
                    <label for="section_id">Select Section</label>
                    <select name="section_id" id="section_id"  class="form-control">
                        <option value="">Select</option>
                        @foreach ($sections as $section)
                        <option value="{{ $section['id'] }}" 
                        @if ($category['section_id']==$section['id'])
                        {{ 'selected' }}
                        @endif
                        >{{ $section['name'] }}</option>                            
                        @endforeach
                    </select>
                </div>  
                <div class="form-group">
                    <label for="parent_id">Select Category Level</label>
                    <select name="parent_id" id="parent_id"  class="form-control">
                        <option value="0">Main Category</option>
                        @foreach ($categories as $item)
                        <option value="{{ $item['id'] }}" 
                        @if ($category['parent_id']==$item['id'])
                        {{ 'selected' }} 
                        @endif
                        >{{ $item['category_name'] }}</option>                            
                        @endforeach
                    </select>
                </div>  
                <div class="form-group">
                    <label for="category_image">Category Image</label>
                    <input type="file" class="form-control" name="category_image" id="category_image">
                    @if (!empty($category['category_image']))
                    <img src="{{ asset('admin/images/categories/'.$category['category_image']) }}" alt="category image" width="250" height="250">
                      {{-- <a href="{{ url('admin/images/categories/'.$category['category_image']) }}"> View Image</a>
                      <input type="hidden" name="current_category_image" value="{{ $category['category_image'] }}"> --}}
                    @endif
                </div>  
                <div class="form-group">
                    <label for="category_discount">Category Discount</label>
                    <input type="text" class="form-control" id="category_discount" 
                    @if (!empty($category['category_discount']))
                        value="{{ $category['category_discount'] }}"
                    @endif 
                    placeholder="Enter Discount Value" name="category_discount" required>
                </div>  
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter Category Description">
                    {{-- @if (!empty($$category['description']))
                        {{ htmlspecialchars($category['description']) }} 
                        {{ 'done' }}
                    @endif --}}
                    </textarea>
                </div>  
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" id="url" 
                    @if (!empty($category['url']))
                        value="{{ $category['url'] }}"
                    @endif 
                    placeholder="Enter url" name="url" required>
                </div>  
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" 
                    @if (!empty($category['meta_title']))
                        value="{{ $category['meta_title'] }}"
                    @endif 
                    placeholder="Enter meta title" name="meta_title" required>
                </div>  
                <div class="form-group">
                    <label for="meta_description">Meta Describtion</label>
                    <input type="text" class="form-control" id="meta_description" 
                    @if (!empty($category['meta_description']))
                        value="{{ $category['meta_description'] }}"
                    @endif 
                    placeholder="Enter meta description" name="meta_description" required>
                </div>  
                <div class="form-group">
                    <label for="meta_keywords">Meta Keywords</label>
                    <input type="text" class="form-control" id="meta_keywords" 
                    @if (!empty($category['meta_keywords']))
                        value="{{ $category['meta_keywords'] }}"
                    @endif 
                    placeholder="Enter meta keywords" name="meta_keywords" required>
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
