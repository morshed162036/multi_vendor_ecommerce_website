@extends('admin.layout.layout')
@section('main-content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Vendor Details</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Personal Details</h4>
          <div class="form-group">
            <label>Vendor Photo</label>
            <br>
            @if (!empty($vendorDetails['image']))
            <img src="{{ asset('admin/images/profilepic/'.$vendorDetails['image']) }}" alt="vendor image" width="250" height="250">
            @endif
          </div>
          <div class="form-group">
            <label>Username/Email</label>
            <input class="form-control" value="{{ $vendorDetails['vendor_personal']['email'] }}" readonly>
          </div>
          <div class="form-group">
            <label for="vendor_name">Name</label>
            <input type="text" class="form-control" id="vendor_name" value="{{ $vendorDetails['vendor_personal']['email'] }}" placeholder="Enter valid name" name="vendor_name" readonly>
          </div>
          <div class="form-group">
            <label for="vendor_state">State</label>
            <input type="text" class="form-control" id="vendor_state" value="{{ $vendorDetails['vendor_personal']['state'] }}" placeholder="Enter valid name" name="vendor_state" readonly>
          </div>
          <div class="form-group">
            <label for="vendor_city">City</label>
            <input type="text" class="form-control" id="vendor_city" value="{{ $vendorDetails['vendor_personal']['city'] }}" placeholder="Enter valid name" name="vendor_city" readonly>
          </div>
          <div class="form-group">
            <label for="vendor_country">Country</label>
            <input type="text" class="form-control" id="vendor_country" value="{{ $vendorDetails['vendor_personal']['country'] }}" placeholder="Enter valid name" name="vendor_country" readonly>
          </div>
          <div class="form-group">
            <label for="vendor_address">Address</label>
            <input type="text" class="form-control" id="vendor_address" value="{{ $vendorDetails['vendor_personal']['address'] }}" placeholder="Enter valid name" name="vendor_address" readonly>
          </div>
          <div class="form-group">
            <label for="vendor_pincode">Pin code</label>
            <input type="text" class="form-control" id="vendor_pincode" value="{{ $vendorDetails['vendor_personal']['pincode'] }}" placeholder="Enter valid name" name="vendor_pincode" readonly>
          </div>
          <div class="form-group">
            <label for="vendor_nid">NID</label>
            <input type="text" class="form-control" id="vendor_nid" value="{{ $vendorDetails['vendor_personal']['nid'] }}" placeholder="Enter valid name" name="vendor_nid" readonly>
          </div>
          <div class="form-group">
            <label for="vendor_trade_license">Trade License</label>
            <input type="text" class="form-control" id="vendor_trade_license" value="{{ $vendorDetails['vendor_personal']['trade_license'] }}" placeholder="Enter valid name" name="vendor_trade_license" readonly>
          </div>
          <div class="form-group">
            <label for="vendor_mobile">Mobile</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-white">+880</span>
              </div>
              <input type="text" class="form-control" id="vendor_mobile" value="{{ $vendorDetails['vendor_personal']['mobile']}}" placeholder="Enter 10 digit Mobile Number" name="vendor_mobile" readonly maxlength="10" minlength="10">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Business Details</h4>
          <div class="form-group">
            <label>Shop Logo</label>
            <br>
            @if (!empty($vendorDetails['vendor_business']['shop_logo']))
            <img src="{{ asset('admin/images/vendor_shop_logo/'.$vendorDetails['vendor_business']['shop_logo']) }}" alt="vendor image" width="250" height="250">
            @endif
          </div>
          <div class="form-group">
            <label for="shop_name">Shop Name</label>
            <input type="text" class="form-control" id="shop_name" value="{{ $vendorDetails['vendor_business']['shop_name'] }}" placeholder="Enter valid name" name="shop_name" readonly>
          </div>
          <div class="form-group">
            <label for="shop_address">Shop Address</label>
            <input type="text" class="form-control" id="shop_address" value="{{ $vendorDetails['vendor_business']['shop_address'] }}" placeholder="Enter valid name" name="shop_address" readonly>
          </div>
          <div class="form-group">
            <label for="shop_state">State</label>
            <input type="text" class="form-control" id="shop_state" value="{{ $vendorDetails['vendor_business']['shop_state'] }}" placeholder="Enter valid name" name="shop_state" readonly>
          </div>
          <div class="form-group">
            <label for="shop_city">City</label>
            <input type="text" class="form-control" id="shop_city" value="{{ $vendorDetails['vendor_business']['shop_city'] }}" placeholder="Enter valid name" name="shop_city" readonly>
          </div>
          <div class="form-group">
            <label for="shop_country">Country</label>
            <input type="text" class="form-control" id="shop_country" value="{{ $vendorDetails['vendor_business']['shop_country'] }}" placeholder="Enter valid name" name="shop_country" readonly>
          </div>
          <div class="form-group">
            <label for="shop_pincode">Pic Code</label>
            <input type="text" class="form-control" id="shop_pincode" value="{{ $vendorDetails['vendor_business']['shop_pincode'] }}" placeholder="Enter valid name" name="shop_pincode" readonly>
          </div>
          <div class="form-group">
            <label for="shop_mobile">Shop Mobile</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-white">+880</span>
              </div>
              <input type="text" class="form-control" id="shop_mobile" value="{{ $vendorDetails['vendor_business']['shop_mobile'] }}" placeholder="Enter 10 digit Mobile Number" name="shop_mobile" readonly maxlength="10" minlength="10">
            </div>
          </div>
          <div class="form-group">
            <label for="shop_website">Shop Website</label>
            <input type="text" class="form-control" id="shop_website" value="{{ $vendorDetails['vendor_business']['shop_website'] }}" placeholder="Null" name="shop_website" readonly>
          </div>
          <div class="form-group">
            <label for="shop_email">Shop Email</label>
            <input type="text" class="form-control" id="shop_email" value="{{ $vendorDetails['vendor_business']['shop_email'] }}" placeholder="Enter valid name" name="shop_email" readonly>
          </div>
          <div class="form-group">
            <label for="business_license_number">License Number</label>
            <input type="text" class="form-control" id="business_license_number" value="{{ $vendorDetails['vendor_business']['business_license_number'] }}" placeholder="Enter valid name" name="business_license_number" readonly>
          </div>
          <div class="form-group">
            <label for="tin_number">TIN Number</label>
            <input type="text" class="form-control" id="tin_number" value="{{ $vendorDetails['vendor_business']['tin_number'] }}" placeholder="Enter valid name" name="tin_number" readonly>
          </div>
          <div class="form-group">
            <label for="address_proof">Address Proof</label>
            <input type="text" class="form-control" id="address_proof" name="address_proof" value="{{ $vendorDetails['vendor_business']['address_proof'] }}" readonly >
          </div>
          <div class="form-group">
            <label>Address Proof Photo</label>
            <br>
            @if (!empty($vendorDetails['vendor_business']['address_proof_image']))
            <img src{{ url('admin/images/vendor_address_proof_pic/'.$vendorDetails['vendor_business']['address_proof_image'])}}  width="250" height="250">
            @endif
          </div>
          <div class="form-group">
            <label>License Certificate</label>
            <br>
            @if (!empty($vendorDetails['vendor_business']['license_certificate']))
            <img src{{ url('admin/images/license_certificate/'.$vendorDetails['vendor_business']['license_certificate'])}}  width="250" height="250">   
            @endif
          </div>
          <div class="form-group">
            <label>TIN Cirtificate</label>
            <br>
            @if (!empty($vendorDetails['vendor_business']['tin_certificate']))
            <img src{{ url('admin/images/vendor_tin_certificate_pic/'.$vendorDetails['vendor_business']['tin_certificate'])}}  width="250" height="250">   
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Bank Details</h4>
          <div class="form-group">
            <label for="acount_holder_name">Account Holder Name</label>
            <input type="text" class="form-control" id="acount_holder_name" value="{{ $vendorDetails['vendor_bank']['acount_holder_name'] }}" placeholder="Enter valid name" name="acount_holder_name" readonly>
          </div>
          <div class="form-group">
            <label for="bank_name">Bank Name</label>
            <input type="text" class="form-control" id="bank_name" value="{{ $vendorDetails['vendor_bank']['bank_name'] }}" placeholder="Enter valid name" name="bank_name" readonly>
          </div>
          <div class="form-group">
            <label for="account_number">Account Number</label>
            <input type="text" class="form-control" id="account_number" value="{{ $vendorDetails['vendor_bank']['account_number'] }}" placeholder="Enter valid name" name="account_number" readonly>
          </div>
          <div class="form-group">
            <label for="bank_ifsc_code">IFSC Code</label>
            <input type="text" class="form-control" id="bank_ifsc_code" value="{{ $vendorDetails['vendor_bank']['bank_ifsc_code'] }}" placeholder="Enter valid name" name="bank_ifsc_code" readonly>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
