<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::insert([
            [
                'email'      => 'andreweroyla.offcl@gmail.com',
                'phone'      => '+6391234567890',
                'address'    => 'Murcia, Negros Occidental',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email'      => 'andreweroyla123@gmail.com',
                'phone'      => '+639676767676',
                'address'    => 'Cute Avenue, New York',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email'      => 's2301947@usls.edu.ph',
                'phone'      => '+630987654321',
                'address'    => 'Jimmy St., Bob City',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
