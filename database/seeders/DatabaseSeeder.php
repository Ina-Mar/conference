<?php

namespace Database\Seeders;

use App\Models\Conference;
use App\Models\Registration;
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

         User::factory(10)->create();

        //User::factory()->create([
           // 'name' => 'Test User',
            //'email' => 'test@example.com',
        //]);
        Conference::factory(10)->create();
        $this->call(RolePermissionSeeder::class);
        //Registration::factory(20)->create();
    }
}
