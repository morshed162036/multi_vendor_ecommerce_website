<?php

namespace Database\Seeders;
use App\Models\vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id'=>1,'name'=>'vendor1','address'=>'mirpur,dhaka' ,'city'=>'dhaka','state'=>'mirpur','country'=>'Bangladesh','pincode'=>'1234','mobile'=>'1234567890','email'=>'vendor1@vendor.com','nid'=>'1234','trade_license'=>'1234','status'=>0]
        ];
        vendor::insert($vendorRecords);
    }
}
