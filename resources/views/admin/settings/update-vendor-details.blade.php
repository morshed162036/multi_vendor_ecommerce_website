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
                    
                </div>
                <div class="form-group">
                    <label for="bank_name">Bank Name</label>
                    <input type="text" class="form-control" id="bank_name" value="{{ $vendorDetails['bank_name'] }}" placeholder="Enter valid name" name="bank_name" required>
                    
                </div>
                <div class="form-group">
                    <label for="account_number">Account Number</label>
                    <input type="text" class="form-control" id="account_number" value="{{ $vendorDetails['account_number'] }}" placeholder="Enter valid name" name="account_number" required>
                    
                </div>
                <div class="form-group">
                    <label for="bank_ifsc_code">IFSC Code</label>
                    <input type="text" class="form-control" id="bank_ifsc_code" value="{{ $vendorDetails['bank_ifsc_code'] }}" placeholder="Enter valid name" name="bank_ifsc_code" required>
                    
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
                    
                </div>
                <div class="form-group">
                    <label for="vendor_state">State</label>
                    <input type="text" class="form-control" id="vendor_state" value="{{ $vendorDetails['state'] }}" placeholder="Enter valid name" name="vendor_state" required>
                    
                </div>
                <div class="form-group">
                    <label for="vendor_city">City</label>
                    <input type="text" class="form-control" id="vendor_city" value="{{ $vendorDetails['city'] }}" placeholder="Enter valid name" name="vendor_city" required>
                    
                </div>
                <div class="form-group">
                    <label for="vendor_country">Country</label>
                    <input type="text" class="form-control" id="vendor_country" value="{{ $vendorDetails['country'] }}" placeholder="Enter valid name" name="vendor_country" required>
                    
                </div>
                <div class="form-group">
                    <label for="vendor_address">Address</label>
                    <input type="text" class="form-control" id="vendor_address" value="{{ $vendorDetails['address'] }}" placeholder="Enter valid name" name="vendor_address" required>
                    
                </div>
                <div class="form-group">
                    <label for="vendor_pincode">Pin code</label>
                    <input type="text" class="form-control" id="vendor_pincode" value="{{ $vendorDetails['pincode'] }}" placeholder="Enter valid name" name="vendor_pincode" required>
                    
                </div>
                <div class="form-group">
                    <label for="vendor_nid">NID</label>
                    <input type="text" class="form-control" id="vendor_nid" value="{{ $vendorDetails['nid'] }}" placeholder="Enter valid name" name="vendor_nid" required>
                    
                </div>
                <div class="form-group">
                    <label for="vendor_trade_license">Trade License</label>
                    <input type="text" class="form-control" id="vendor_trade_license" value="{{ $vendorDetails['trade_license'] }}" placeholder="Enter valid name" name="vendor_trade_license" required>
                    
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
                    <label for="shop_name">Shop Name</label>
                    <input type="text" class="form-control" id="shop_name" value="{{ $vendorDetails['shop_name'] }}" placeholder="Enter valid name" name="shop_name" required>
                    
                </div>
                <div class="form-group">
                    <label for="shop_address">Shop Address</label>
                    <input type="text" class="form-control" id="shop_address" value="{{ $vendorDetails['shop_address'] }}" placeholder="Enter valid name" name="shop_address" required>
                    
                </div>
                <div class="form-group">
                    <label for="shop_state">State</label>
                    <input type="text" class="form-control" id="shop_state" value="{{ $vendorDetails['shop_state'] }}" placeholder="Enter valid name" name="shop_state" required>
                    
                </div>
                <div class="form-group">
                    <label for="shop_city">City</label>
                    <input type="text" class="form-control" id="shop_city" value="{{ $vendorDetails['shop_city'] }}" placeholder="Enter valid name" name="shop_city" required>
                    
                </div>
                <div class="form-group">
                    <label for="shop_country">Country</label>
                    <input type="text" class="form-control" id="shop_country" value="{{ $vendorDetails['shop_country'] }}" placeholder="Enter valid name" name="shop_country" required>
                    
                </div>
                <div class="form-group">
                    <label for="shop_pincode">Pic Code</label>
                    <input type="text" class="form-control" id="shop_pincode" value="{{ $vendorDetails['shop_pincode'] }}" placeholder="Enter valid name" name="shop_pincode" required>
                    
                </div>
                <div class="form-group">
                    <label for="shop_mobile">Shop Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">+880</span>
                        </div>
                        <input type="text" class="form-control" id="shop_mobile" value="{{ $vendorDetails['shop_mobile'] }}" placeholder="Enter 10 digit Mobile Number" name="shop_mobile" required maxlength="10" minlength="10">
                    </div>
                </div>
                <div class="form-group">
                    <label for="shop_website">Shop Website</label>
                    <input type="text" class="form-control" id="shop_website" value="{{ $vendorDetails['shop_website'] }}" placeholder="Enter valid name" name="shop_website">
                    
                </div>
                <div class="form-group">
                    <label for="shop_email">Shop Email</label>
                    <input type="text" class="form-control" id="shop_email" value="{{ $vendorDetails['shop_email'] }}" placeholder="Enter valid name" name="shop_email" required>
                    
                </div>
                <div class="form-group">
                    <label for="business_license_number">License Number</label>
                    <input type="text" class="form-control" id="business_license_number" value="{{ $vendorDetails['business_license_number'] }}" placeholder="Enter valid name" name="business_license_number" readonly>
                    
                </div>
                <div class="form-group">
                    <label for="tin_number">TIN Number</label>
                    <input type="text" class="form-control" id="tin_number" value="{{ $vendorDetails['tin_number'] }}" placeholder="Enter valid name" name="tin_number" readonly>
                </div>
                <div class="form-group">
                    <label for="address_proof">Address Proof</label>
                    <select class="form-control" id="address_proof" name="address_proof" required>
                        <option value="Passport">Passport</option>
                        <option value="NID">NID</option>
                        <option value="Driving License">Driving License</option>
                    </select>
                </div>
                <div class="form-group">
                      <label>Address Proof Photo</label>
                      <input type="file" id="address_proof_image" name="address_proof_image" class="form-control" readonly>
                      @if (!empty($vendorDetails['']))
                      <a href="{{ url('admin/images/vendor_address_proof_pic/'.$vendorDetails['address_proof_image']) }}"> View Image</a>
                      <input type="hidden" name="current_address_proof" value="{{ $vendorDetails['address_proof_image'] }}">
                          
                      @endif
                </div>
                <div class="form-group">
                      <label>License Certificate</label>
                      <input type="file" id="license_certificate" name="license_certificate" class="form-control" readonly>
                      
                      @if (!empty($vendorDetails['']))
                      <a href="{{ url('admin/images/license_certificate/'.$vendorDetails['license_certificate']) }}"> View Image</a>
                      <input type="hidden" name="current_license_certificate" value="{{ $vendorDetails['license_certificate'] }}">
                          
                      @endif
                </div>
                <div class="form-group">
                      <label>TIN Cirtificate</label>
                      <input type="file" id="tin_certificate" name="tin_certificate" class="form-control" readonly>
                      
                      @if (!empty($vendorDetails['']))
                      <a href="{{ url('admin/images/vendor_tin_certificate_pic/'.$vendorDetails['tin_certificate']) }}"> View Image</a>
                      <input type="hidden" name="current_tin_certificate" value="{{ $vendorDetails['tin_certificate'] }}">
                          
                      @endif
                </div>
                <div class="form-group">
                      <label>Shop Logo</label>
                      <input type="file" id="shop_logo" name="shop_logo" class="form-control">
                      
                      @if (!empty($vendorDetails['']))
                      <a href="{{ url('admin/images/vendor_shop_logo/'.$vendorDetails['shop_logo']) }}"> View Image</a>
                      <input type="hidden" name="current_shop_logo" value="{{ $vendorDetails['shop_logo'] }}">
                          
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
