<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(\App\Models\User::all()) > 0)
        {
            return;
        }

        $faker = \Faker\Factory::create();
        $cover_storage_path = storage_path('app/public/users');
        File::isDirectory($cover_storage_path) or File::makeDirectory($cover_storage_path, 0777, true, true);

        $file_cover_storage_path = storage_path('app/public/files');
        File::isDirectory($file_cover_storage_path) or File::makeDirectory($file_cover_storage_path, 0777, true, true);

        for($i = 0; $i <= 30; $i++)
        {
            $user = new \App\Models\User();
            $user->name = $faker->name();
            $user->first_name = $faker->name();
            $user->email = $faker->email();
            $user->date_of_entry = $faker->date();
            $user->image = $faker->file(public_path('samples/users'), $cover_storage_path, false);
            $user->file = $faker->file(public_path('samples/files'), $file_cover_storage_path, false);
            $user->candidate_number = $faker->randomElement(['UYTeii839', 'OP03003', 'op3o22f']);
            $user->code = $faker->randomElement(['UYTeii839', 'OP03003', 'op3o22f', '989HUYLLk']);
            $user->phone = $faker->phoneNumber();
            $user->password = Hash::make("password");
            $user->save();

        }
    }
}
