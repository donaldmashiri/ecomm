<?php

namespace Database\Seeders;

use App\Models\Vendor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::where('email', 'admin@gmail.com')->first();

        $vendor = new Vendor();
        $vendor->banner = 'uploads/1343.jpg';
        $vendor->phone = '0776675202';
        $vendor->email = 'admin@gmail.com';
        $vendor->address = 'ZiM';
        $vendor->description = 'shop description';
        $vendor->user_id = $user->id;
        $vendor->save();
     }
}
