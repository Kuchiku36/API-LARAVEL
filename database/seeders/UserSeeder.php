<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['Admin Test','User test'];
        $emails = ['admin@test.com','user@test.com'];
        $commonPassword = 'password';
        //
        $count = count($names);

        for ($i = 0; $i < $count; $i++) {
            $existingUser = User::where('email',$emails[$i])->first();

            if (!$existingUser){
                $user = new User ();
                $user->name=$names[$i];
                $user->email=$emails[$i];
                $user->password=Hash::make($commonPassword);
                $user->save();
            }
        }
    }
}
