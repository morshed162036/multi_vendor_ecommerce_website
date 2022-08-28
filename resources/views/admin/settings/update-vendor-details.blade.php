@extends('admin.layout.layout')

@section('main-content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Update Vendor Details</h3>
                </div>
            </div>
        </div>

        @if($slog=='bank')
        
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Bank Details</h4>
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
                <form class="forms-sample" action="{{ url('admin/update-vendor-details/bank') }}" method="post" enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label>Username/Email</label>
                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="acount_holder_name">Account Holder Name</label>
                    <input type="text" class="form-control" id="acount_holder_name" value="{{ $vendorDetails['acount_holder_name'] }}" placeholder="Enter valid name" name="acount_holder_name" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="bank_name">Bank Name</label>
                    <input type="text" class="form-control" id="bank_name" value="{{ $vendorDetails['bank_name'] }}" placeholder="Enter valid name" name="bank_name" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="account_number">Account Number</label>
                    <input type="text" class="form-control" id="account_number" value="{{ $vendorDetails['account_number'] }}" placeholder="Enter valid name" name="account_number" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="bank_ifsc_code">IFSC Code</label>
                    <input type="text" class="form-control" id="bank_ifsc_code" value="{{ $vendorDetails['bank_ifsc_code'] }}" placeholder="Enter valid name" name="bank_ifsc_code" required>
                    <span id="check_password"></span>
                </div>
                
                
                <button type="submit" class="btn btn-primary mt-3">Update</button>
                {{-- <a onclick="clearImage()" class="btn btn-primary mt-3">Clear</a> --}}

                </form>
            </div>
            </div>
        </div>
        @elseif ($slog=='personal')
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Personal Details</h4>
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
                <form class="forms-sample" action="{{ url('admin/update-vendor-details/personal') }}" method="post" enctype="multipart/form-data"> @csrf
                    
                <div class="form-group">
                    <label>Username/Email</label>
                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly>
                </div>
                <div class="form-group">
                    <label for="vendor_name">Name</label>
                    <input type="text" class="form-control" id="vendor_name" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter valid name" name="vendor_name" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="vendor_state">State</label>
                    <input type="text" class="form-control" id="vendor_state" value="{{ $vendorDetails['state'] }}" placeholder="Enter valid name" name="vendor_state" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="vendor_city">City</label>
                    <input type="text" class="form-control" id="vendor_city" value="{{ $vendorDetails['city'] }}" placeholder="Enter valid name" name="vendor_city" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="vendor_country">Country</label>
                    <input type="text" class="form-control" id="vendor_country" value="{{ $vendorDetails['country'] }}" placeholder="Enter valid name" name="vendor_country" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="vendor_address">Address</label>
                    <input type="text" class="form-control" id="vendor_address" value="{{ $vendorDetails['address'] }}" placeholder="Enter valid name" name="vendor_address" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="vendor_pincode">Pin code</label>
                    <input type="text" class="form-control" id="vendor_pincode" value="{{ $vendorDetails['pincode'] }}" placeholder="Enter valid name" name="vendor_pincode" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="vendor_nid">NID</label>
                    <input type="text" class="form-control" id="vendor_nid" value="{{ $vendorDetails['nid'] }}" placeholder="Enter valid name" name="vendor_nid" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="vendor_trade_license">Trade License</label>
                    <input type="text" class="form-control" id="vendor_trade_license" value="{{ $vendorDetails['trade_license'] }}" placeholder="Enter valid name" name="vendor_trade_license" required>
                    <span id="check_password"></span>
                </div>
                
                <div class="form-group">
                    <label for="vendor_mobile">Mobile</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary text-white">+880</span>
                      </div>
                      <input type="text" class="form-control" id="vendor_mobile" value="{{ Auth::guard('admin')->user()->mobile}}" placeholder="Enter 10 digit Mobile Number" name="vendor_mobile" required maxlength="10" minlength="10">
                    </div>
                </div>
                <div class="form-group">
                      <label>Vendor Photo</label>
                      <input type="file" id="vendor_image" name="vendor_image" class="form-control">
                      
                      @if (!empty(Auth::guard('admin')->user()->image))
                      <a href="{{ url('admin/images/profilepic/'.Auth::guard('admin')->user()->image) }}"> View Image</a>
                      <input type="hidden" name="current_vendor_image" value="{{ Auth::guard('admin')->user()->image }}">
                          
                      @endif
                </div>
                
                
                <button type="submit" class="btn btn-primary mt-3">Update</button>
                {{-- <a onclick="clearImage()" class="btn btn-primary mt-3">Clear</a> --}}

                </form>
            </div>
            </div>
        </div>
        @elseif ($slog=='business')
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Business Details</h4>
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
                <form class="forms-sample" action="{{ url('admin/update-vendor-details/business') }}" method="post" enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label>Username/Email</label>
                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="admin_name">Shop Name</label>
                    <input type="text" class="form-control" id="admin_name" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter valid name" name="admin_name" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="admin_name">Shop Address</label>
                    <input type="text" class="form-control" id="admin_name" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter valid name" name="admin_name" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="admin_name">State</label>
                    <input type="text" class="form-control" id="admin_name" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter valid name" name="admin_name" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="admin_name">City</label>
                    <input type="text" class="form-control" id="admin_name" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter valid name" name="admin_name" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="admin_name">Country</label>
                    <input type="text" class="form-control" id="admin_name" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter valid name" name="admin_name" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="admin_name">Pic Code</label>
                    <input type="text" class="form-control" id="admin_name" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter valid name" name="admin_name" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="admin_mobile">Shop Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">+880</span>
                        </div>
                        <input type="text" class="form-control" id="admin_mobile" value="{{ Auth::guard('admin')->user()->mobile}}" placeholder="Enter 10 digit Mobile Number" name="admin_mobile" required maxlength="10" minlength="10">
                    </div>
                </div>
                <div class="form-group">
                    <label for="admin_name">Shop Website</label>
                    <input type="text" class="form-control" id="admin_name" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter valid name" name="admin_name" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="admin_name">Shop Email</label>
                    <input type="text" class="form-control" id="admin_name" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter valid name" name="admin_name" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="admin_name">License Number</label>
                    <input type="text" class="form-control" id="admin_name" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter valid name" name="admin_name" required>
                    <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="admin_name">TIN Number</label>
                    <input type="text" class="form-control" id="admin_name" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter valid name" name="admin_name" required>
                </div>
                <div class="form-group">
                    <label for="admin_name">Address Proof</label>
                    <select class="form-control" id="admin_name" name="admin_name" required>
                        <option value="Passport">Passport</option>
                        <option value="NID">NID</option>
                        <option value="Driving License">Driving License</option>
                    </select>
                </div>
                <div class="form-group">
                      <label>Address Proof Photo</label>
                      <input type="file" id="admin_image" name="admin_image" class="form-control">
                      @if (!empty(Auth::guard('admin')->user()->image))
                      <a href="{{ url('admin/images/profilepic/'.Auth::guard('admin')->user()->image) }}"> View Image</a>
                      <input type="hidden" name="current_admin_image" value="{{ Auth::guard('admin')->user()->image }}">
                          
                      @endif
                </div>
                <div class="form-group">
                      <label>License Certificate</label>
                      <input type="file" id="admin_image" name="admin_image" class="form-control">
                      
                      @if (!empty(Auth::guard('admin')->user()->image))
                      <a href="{{ url('admin/images/profilepic/'.Auth::guard('admin')->user()->image) }}"> View Image</a>
                      <input type="hidden" name="current_admin_image" value="{{ Auth::guard('admin')->user()->image }}">
                          
                      @endif
                </div>
                <div class="form-group">
                      <label>TIN Cirtificate</label>
                      <input type="file" id="admin_image" name="admin_image" class="form-control">
                      
                      @if (!empty(Auth::guard('admin')->user()->image))
                      <a href="{{ url('admin/images/profilepic/'.Auth::guard('admin')->user()->image) }}"> View Image</a>
                      <input type="hidden" name="current_admin_image" value="{{ Auth::guard('admin')->user()->image }}">
                          
                      @endif
                </div>
                <div class="form-group">
                      <label>Shop Logo</label>
                      <input type="file" id="admin_image" name="admin_image" class="form-control">
                      
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
        @endif
    </div>
</div>
    
@endsection
