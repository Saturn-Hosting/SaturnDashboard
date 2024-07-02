<?php

namespace Database\Seeders;

use App\Models\Node;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
            'email' => 'admin@example.com',
            'password' => 'pass',
            'is_admin' => true,
        ]);
        Node::factory()->create([
            'name' => 'Node1',
            'location' => 'Sweden',
        ]);
        Node::factory()->create([
            'name' => 'Node2',
            'location' => 'Netherlands',
        ]);
        Node::factory()->create([
            'name' => 'Node3',
            'location' => 'United Kingdom',
        ]);
    }
}
