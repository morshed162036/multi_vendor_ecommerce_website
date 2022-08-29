@extends('admin.layout.layout')

@section('main-content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Admin Management</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $title }} Table</h4>
                  {{-- <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p> --}}
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Image
                          </th>
                          <th>
                            ID
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Role
                          </th>
                          <th>
                            Mobile
                          </th>
                          <th>
                            Email
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
                        
                        @foreach ($admindata as $item)
                        
                        <tr>
                          <td class="py-1">
                            <img src="{{ asset('admin/images/profilepic/'.$item['image']) }}" alt="image"/>
                          </td>
                          <td>
                            {{ $item['id'] }}
                          </td>
                          <td>
                            {{ $item['name'] }}
                          </td>
                          <td>
                            {{ $item['type'] }}
                          </td>
                          <td>
                            0{{ $item['mobile'] }}
                          </td>
                          <td>
                            {{ $item['email'] }}
                          </td>
                          <td>
                            @if ($item['status']=='1')
                                <label class="badge badge-success">Active</label>
                            @else
                                <label class="badge badge-danger">Inactive</label>                                
                            @endif
                            {{-- {{ $item['status'] }} --}}
                          </td>
                          <td>
                            @if ($item['type']=='vendor')
                            <a href="{{ url('admin/admins/view-vendor-details/'.$item['id']) }}" target="_blank" rel="noopener noreferrer"><i class="mdi mdi-file-document"></i></a>
                                
                            @endif
                            
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
