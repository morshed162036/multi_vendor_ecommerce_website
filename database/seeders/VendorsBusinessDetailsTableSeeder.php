<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendersBusinessDetail;
class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id'=>1,'vendor_id'=>1,'shop_name'=>'vendor1_shop','shop_address'=>'mirpur,dhaka','shop_city'=>'dhaka','shop_state'=>'mirpur','shop_country'=>'Bangladesh','shop_pincode'=>'1234','shop_mobile'=>'1234567890','shop_website'=>'','shop_email'=>'vendor1_shop@gmail.com','address_proof'=>'','address_proof_image'=>'','business_license_number'=>'1234','tin_number'=>'1234','tin_certificate'=>'']
        ];
        VendersBusinessDetail::insert($vendorRecords);
    }
}
