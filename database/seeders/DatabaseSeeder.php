<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
// use Database\seeders\tenant_categorySeeder;
// use Database\seeders\tenantSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin123',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        $this->call([tenant_categorySeeder::class, tenantSeeder::class, MenuSeeder::class]);
    }
}