<?php

namespace Database\Seeders;

use App\Models\Connection;
use App\Models\UserDatabases;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $udb = UserDatabases::all()->where("database", "project1")->first();
        Connection::getDynamicConnection($udb);
        for ($i = 0; $i < 10; $i++) {
            DB::connection($udb->database)->table("book")->insert([
                'name' => fake()->words(3, true),
                'price' => rand(10, 100)
            ]);
        }
    }
}
