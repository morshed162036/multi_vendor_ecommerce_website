<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Image;
use App\Models\admin;
use App\Models\vendor;
use App\Models\VendersBusinessDetail;
use App\Models\VendersBankDetail;

class AdminController extends Controller
{
    public function dashboard(){
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
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    
    public function updatePassword(Request $request){
        
        
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

            $vendorDetails = vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();

        }
        elseif ($slog=='bank') {
            if($request->isMethod('post')){

            }
            $vendorDetails = VendersBankDetail::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        }
        elseif ($slog=='business') {
            if($request->isMethod('post')){

            }
            $vendorDetails = VendersBusinessDetail::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        }
        return view("admin.settings.update-vendor-details")->with(compact('slog','vendorDetails'));
    }

}
