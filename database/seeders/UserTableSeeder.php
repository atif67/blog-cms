<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'ali@osman.com')->first();
        if(!$user)
        {
            User::create([
                'name' => 'Ali Osman',
                'email' => 'ali@osman.com',
                'role' => 'admin',
                'password' => Hash::make('aliosman')
            ]);
        }
    }
}
