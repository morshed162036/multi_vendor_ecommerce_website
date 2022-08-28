<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $adminRecords = [
            ['id'=>2,'name'=>'vendor1','type'=>'vendor','vendor_id'=>1,'mobile'=>'1234567890','email'=>'vendor1@vendor.com','password'=>'$2a$12$2gcRRWkSMc76aciQTrw4Zu/4LhHrrjmfG8g5uXrkMRgI/oVT28ftm','image'=>'','status'=>0],
         ];
         admin::insert($adminRecords);
    }
}
