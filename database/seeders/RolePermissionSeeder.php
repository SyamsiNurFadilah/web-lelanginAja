<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'view auctions']);
        Permission::create(['name' => 'edit own auctions']);
        Permission::create(['name' => 'delete own auctions']);
        Permission::create(['name' => 'create auctions']);
        Permission::create(['name' => 'moderete auctions']);
        Permission::create(['name' => 'bid auctions']);
        Permission::create(['name' => 'view own bids']);
        Permission::create(['name' => 'manage winners']);
        Permission::create(['name' => 'view reports']);
        Permission::create(['name' => 'manage settings']);
        Permission::create(['name' => 'make payments']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'auctioneer']);
        Role::create(['name' => 'bidder']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo([
            'manage users',
            'view auctions',
            'moderete auctions',
            'view own bids',
            'manage winners',
            'view reports',
            'manage settings',
        ]);

        $roleAuctioneer = Role::findByName('auctioneer');
        $roleAuctioneer->givePermissionTo([
            'view auctions',
            'edit own auctions',
            'delete own auctions',
            'create auctions',
            'view own bids',
            'manage winners',
        ]);

        $roleBidder = Role::findByName('bidder');
        $roleBidder->givePermissionTo([
            'view auctions',
            'bid auctions',
            'view own bids',
            'make payments',
        ]);
    }
}
