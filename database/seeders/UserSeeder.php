<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $admin->assignRole('admin');

        $auctioneer = User::create([
            'name' => 'Auctioneer',
            'email' => 'auctioneer@gmail.com',
            'password' => bcrypt('auctioneer123')
        ]);
        $auctioneer->assignRole('auctioneer');

        $bidder = User::create([
            'name' => 'Bidder',
            'email' => 'bidder@gmail.com',
            'password' => bcrypt('bidder123')
        ]);
        $bidder->assignRole('bidder');
    }
}
