<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Image;
use Illuminate\Support\Facades\Session;

use App\Models\admin;
use App\Models\vendor;
use App\Models\VendersBusinessDetail;
use App\Models\VendersBankDetail;

class AdminController extends Controller
{
    public function dashboard(){
        Session::put('page','dashboard');
        return view('admin.dashboard');
    }
    public function login(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            $valodate = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
                return redirect('admin/dashboard');
            }
            else{
                return redirect()->back()->with('error','Invalid Email or Password');
            }
        }


        return view('admin.login');
    }
    
    
    public function updatePassword(Request $request){
        
        Session::put('page','update-password');
        if($request -> isMethod('post')){
            $data = $request->all();
            $hashedValue = Auth::guard('admin')->user()->password;

            if(Hash::check($data['current_password'], $hashedValue)){
                if($data['new_password']==$data['confirm_password']){
                    admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=> bcrypt($data['new_password'])]);
                     return redirect()->back()->with('success','Password has been updated successfully');
                }
                else{
                     return redirect()->back()->with('error','New Password & Confirm Password Not Matching');
                }
            }
            else{
                return redirect()->back()->with('error','Current Password Is Incorrect');
            }

        }
        //return redirect('admin/update-password');
        $admindata = admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray(); 
        return view('admin.settings.update-admin-password')->with(compact('admindata'));
    }

    public function checkCurrentPassword(Request $request)
    {
        $data = $request->all();
        $hashedValue = Auth::guard('admin')->user()->password;

        if(Hash::check($data['current_password'], $hashedValue)){
            return "true";
        }
        else{
            return "false";
        }
    }

    public function updateDetails(Request $request){
        Session::put('page','update-details');
        if($request->isMethod('post')){
            
            $data = $request->all();

            $rules = [
            'admin_name'=>'required|regex:/^[\pL\s\-]+$/u',
            'admin_mobile'=> 'required|numeric|min:10',
            ];
            $customMessages = [
                'admin_name.required'=>'Name is required',
                'admin_mobile.required' => 'Mobile is required',
            ];
            if($request->hasFile('admin_image')){
                $image_temp = $request->file('admin_image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension = $image_temp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'admin/images/profilepic/'.$imageName;
                    Image::make($image_temp)->save($imagePath);
                }
                
            }elseif (!empty($data['current_admin_image'])) {
                $imageName = $data['current_admin_image'];
            }
            else{
                $imageName = "";
            }

            //$this->validate($request,$rules,$customMessages);
            $this->validate($request,$rules);
            //Update Admin details
            admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'],'mobile'=>$data['admin_mobile'],'image'=>$imageName]);
            return redirect()->back()->with('success','Admin Details has been updated successfully');
        }
        
        return view('admin.settings.update-admin-details');
    }

    public function updateVendorDetails(Request $request,$slog){
        if($slog=='personal'){
            if($request->isMethod('post')){
                $data = $request->all();
                $rules = [
                'vendor_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'vendor_mobile'=> 'required|numeric|min:10',
                ];
                
                if($request->hasFile('vendor_image')){
                    $image_temp = $request->file('vendor_image');
                    if($image_temp->isValid()){
                        //Get Image Extension
                        $extension = $image_temp->getClientOriginalExtension();
                        //Generate New Image Name
                        $imageName = rand(111,99999).'.'.$extension;
                        $imagePath = 'admin/images/profilepic/'.$imageName;
                        Image::make($image_temp)->save($imagePath);
                    }
                    
                }elseif (!empty($data['current_vendor_image'])) {
                    $imageName = $data['current_vendor_image'];
                }
                else{
                    $imageName = "";
                }

                $this->validate($request,$rules);

                //Update Admin table details
                admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['vendor_name'],'mobile'=>$data['vendor_mobile'],'image'=>$imageName]);
                //Update Vendor table
                vendor::where('id',Auth::guard('admin')->user()->vendor_id)->update(['name'=>$data['vendor_name'],'mobile'=>$data['vendor_mobile'],'address'=>$data['vendor_address'],'city'=>$data['vendor_city'],'state'=>$data['vendor_state'],'country'=>$data['vendor_country'],'pincode'=>$data['vendor_pincode'],'nid'=>$data['vendor_nid'],'trade_license'=>$data['vendor_trade_license']]);

                return redirect()->back()->with('success','Vendor Personal Details has been updated successfully');
            
            }
            Session::put('page','update-personal-details');
            $vendorDetails = vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();

        }
        elseif ($slog=='bank') {
            if($request->isMethod('post')){
                $data = $request->all();
                $rules = [
                'acount_holder_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'bank_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'account_number'=> 'required|numeric',
                'bank_ifsc_code'=> 'required|numeric',
                ];
                $this->validate($request,$rules);

                // Update Vendor Bank Details

                VendersBankDetail::where('id',Auth::guard('admin')->user()->vendor_id)->update(['acount_holder_name'=>$data['acount_holder_name'],'bank_name'=>$data['bank_name'],'account_number'=>$data['account_number'],'bank_ifsc_code'=>$data['bank_ifsc_code']]);

                return redirect()->back()->with('success','Vendor Bank Details has been updated successfully');
            }
            $vendorDetails = VendersBankDetail::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            Session::put('page','update-bank-details');
        }
        elseif ($slog=='business') {
            if($request->isMethod('post')){
                $data = $request->all();
                $rules = [
                'shop_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'shop_city'=>'required|regex:/^[\pL\s\-]+$/u',
                'shop_state'=>'required|regex:/^[\pL\s\-]+$/u',
                'shop_country'=>'required|regex:/^[\pL\s\-]+$/u',
                'shop_email'=>'required|email',
                'shop_pincode'=> 'required|numeric',
                'shop_mobile'=> 'required|numeric',
                ];

                $this->validate($request,$rules);

                //Address Proof
                if($request->hasFile('address_proof_image')){
                    $image_temp = $request->file('address_proof_image');
                    if($image_temp->isValid()){
                        //Get Image Extension
                        $extension = $image_temp->getClientOriginalExtension();
                        //Generate New Image Name
                        $address_proof_image = rand(111,99999).'.'.$extension;
                        $imagePath = 'admin/images/vendor_address_proof_pic/'.$address_proof_image;
                        Image::make($image_temp)->save($imagePath);
                    }
                    
                }elseif (!empty($data['current_address_proof'])) {
                    $address_proof_image = $data['current_address_proof'];
                }
                else{
                    $address_proof_image = "";
                }
                //Shop Logo
                if($request->hasFile('shop_logo')){
                    $image_temp = $request->file('shop_logo');
                    if($image_temp->isValid()){
                        //Get Image Extension
                        $extension = $image_temp->getClientOriginalExtension();
                        //Generate New Image Name
                        $vendor_shop_logo = rand(111,99999).'.'.$extension;
                        $imagePath = 'admin/images/vendor_shop_logo/'.$vendor_shop_logo;
                        Image::make($image_temp)->save($imagePath);
                    }
                    
                }elseif (!empty($data['current_shop_logo'])) {
                    $vendor_shop_logo = $data['current_shop_logo'];
                }
                else{
                    $vendor_shop_logo = "";
                }
                // //Address Proof
                // if($request->hasFile('address_proof_image')){
                //     $image_temp = $request->file('address_proof_image');
                //     if($image_temp->isValid()){
                //         //Get Image Extension
                //         $extension = $image_temp->getClientOriginalExtension();
                //         //Generate New Image Name
                //         $address_proof_image = rand(111,99999).'.'.$extension;
                //         $imagePath = 'admin/images/vendor_address_proof_pic/'.$address_proof_image;
                //         Image::make($image_temp)->save($imagePath);
                //     }
                    
                // }elseif (!empty($data['current_address_proof'])) {
                //     $address_proof_image = $data['current_address_proof'];
                // }
                // else{
                //     $address_proof_image = "";
                // }
                // //Address Proof
                // if($request->hasFile('address_proof_image')){
                //     $image_temp = $request->file('address_proof_image');
                //     if($image_temp->isValid()){
                //         //Get Image Extension
                //         $extension = $image_temp->getClientOriginalExtension();
                //         //Generate New Image Name
                //         $address_proof_image = rand(111,99999).'.'.$extension;
                //         $imagePath = 'admin/images/vendor_address_proof_pic/'.$address_proof_image;
                //         Image::make($image_temp)->save($imagePath);
                //     }
                    
                // }elseif (!empty($data['current_address_proof'])) {
                //     $address_proof_image = $data['current_address_proof'];
                // }
                // else{
                //     $address_proof_image = "";
                // }
                // Update Vendor Bank Details

                VendersBusinessDetail::where('id',Auth::guard('admin')->user()->vendor_id)->update(['shop_name'=>$data['shop_name'],'shop_address'=>$data['shop_address'],'shop_city'=>$data['shop_city'],'shop_state'=>$data['shop_state'],'shop_country'=>$data['shop_country'],'shop_pincode'=>$data['shop_pincode'],'shop_mobile'=>$data['shop_mobile'],'shop_website'=>$data['shop_website'],'shop_email'=>$data['shop_email'],'shop_logo'=>$vendor_shop_logo]);
            }
            $vendorDetails = VendersBusinessDetail::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            Session::put('page','update-business-details');
        }
        return view("admin.settings.update-vendor-details")->with(compact('slog','vendorDetails'));
    }
    
    public function adminManagement($type = null){
        $admins = admin::query();
        if(!empty($type)){
            $admins = $admins->where('type',$type);
            $title = ucfirst($type)."s";
            Session::put('page','view-'.strtolower($title));
            // dd(Session::get('page'));
        }
        else{
            $title = "All Admin/Sub Admin/Vendor";
            Session::put('page','view-all');
        }
        $admindata = $admins->get()->toArray();
        //dd($admindata);
        return view('admin.admins.adminmanagement')->with(compact('admindata','title'));
    }
       
    public function adminViewVendorDetails($id){
        $vendorDetails = admin::with('vendorPersonal','vendorBank','vendorBusiness')->where('id',$id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails),true);
        //dd($vendorDetails);
        return view('admin.admins.view-vendor-details')->with(compact('vendorDetails'));
    }

    public function updateAdminStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 0;
            }
            else{
                $status = 1;
            }
            admin::where('id',$data['admin_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'admin_id'=> $data['admin_id']]);
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

}
