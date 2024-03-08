<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Actor;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Actor::create([
            'name' => 'Tom Hanks',
        ]);

        Actor::create([
            'name' => 'Tim Allen',
        ]);

        Actor::create([
            'name' => 'Don Rickles',
        ]);

        Actor::create([
            'name' => 'Jim Varney',
        ]);

        Actor::create([
            'name' => 'Wallace Reilly',
        ]);
    }
}
