<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'full_name' => 'Cy Pogi',
            'address'   => 'Tacloban City',
            'email'     => 'cy@eds.com',
            'password'  => Hash::make('asdfasdf')
        ]);

        User::create([
            'full_name' => 'Admin',
            'address'   => 'Tacloban City',
            'type'      => 2,
            'email'     => 'admin@eds.com',
            'password'  => Hash::make('asdfasdf')
        ]);

        User::create([
            'full_name' => 'Technician',
            'address'   => 'Tacloban City',
            'type'      => 1,
            'email'     => 'tech@eds.com',
            'password'  => Hash::make('asdfasdf')
        ]);

        Appointment::create([
            'user_id'   => 1,
            'purpose'   => 'Laptop repair',
            'date'      => Carbon::now()
        ]);
    }
}
