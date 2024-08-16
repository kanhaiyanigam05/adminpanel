<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Meta;
use App\Models\Permission;
use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '12345',
        ]);
        Setting::create([
            'site_name' => 'Admin Panel',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        for ($i = 1; $i <= 100; $i++) {
            Content::create([
                'id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $pages = ['home', 'about', 'services', 'blogs', 'contact'];
        foreach ($pages as $page) {
            Meta::create([
                'page' => $page,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $permissions = ['home', 'about', 'services', 'blogs', 'categories', 'testimonials', 'enquiries', 'setting', 'users'];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
