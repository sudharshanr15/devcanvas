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
        $udb = UserDatabases::all()->where("database", "first_database")->first();
        Connection::getDynamicConnection($udb);
        for ($i = 0; $i < 20; $i++) {
            DB::connection(Connection::getConfigConnectionName($udb))->table("users")->insert([
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'email' => fake()->email(),
                "password" => fake()->password()
            ]);
        }
    }
}
