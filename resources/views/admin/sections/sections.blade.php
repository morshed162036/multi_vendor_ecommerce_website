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
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Section Table</h4>
                  @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success: </strong>{{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                  @endif
                  {{-- <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p> --}}
                  <a href="section-add-edit" class="btn btn-primary"><i class=" mdi mdi-plus"></i> Add Section</a>
                  <div class="table-responsive mt-3">
                    <table class="table table-striped" id="section_table">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach ($sections as $item)
                        
                        <tr>
                          <td>
                            {{ $item['id'] }}
                          </td>
                          <td>
                            {{ $item['name'] }}
                          </td>
                          <td>
                            @if ($item['status']=='1')
                            <a class="updateSectionStatus" id="section-{{ $item['id'] }}"
                            section_id = "{{ $item['id'] }}"
                            href="javascript:void(0)">
                                <label class="badge badge-success" status="Active">Active</label></a>
                            @else
                            <a class="updateSectionStatus" id="section-{{ $item['id'] }}"
                            section_id = "{{ $item['id'] }}"
                             href="javascript:void(0)">
                                <label class="badge badge-danger"status="Inactive">Inactive</label></a>                                
                            @endif
                          </td>
                          <td>
                            <a href="{{ url('admin/section-add-edit/'.$item['id']) }}" ><i style='font-size:25px'class="mdi mdi-pencil-box"></i>
                            </a>
                            <a class="confirmDelete" module="section" module_id="{{ $item['id'] }}" href="javascript:void(0)"><i style='font-size:25px;' class="mdi mdi-delete"></i>
                            </a>
                            
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    </div>
</div>
    
@endsection
<style>
  a label{
    cursor: pointer;
  }
</style> 