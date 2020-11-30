<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Administratior",
            "email" => "admin@tenant.com",
            "password" => bcrypt('123456'),
            "email_verified_at" => Carbon::now(),
            "role_id" => 1,
        ]);
    }
}
