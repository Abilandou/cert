<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(\App\Models\Admin::all()) > 0){
            return;
        }

        $admin = [
            'name' => 'CertAdmin',
            'email' => 'admin@cert.com',
            'phone' => '990099009',
            'image' => 'default.png',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ];

        \App\Models\Admin::create($admin);
    }
}
