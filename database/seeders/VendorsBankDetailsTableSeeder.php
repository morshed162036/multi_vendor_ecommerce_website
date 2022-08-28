<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendersBankDetail;
class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id'=>1,'vendor_id'=>1,'acount_holder_name'=>'vendor1','bank_name'=>'one bank','account_number'=>'vendor1234','bank_ifsc_code'=>'1234']
        ];
        VendersBankDetail::insert($vendorRecords);
    }
}
