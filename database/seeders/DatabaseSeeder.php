<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $data = [
            [
                "name" => "Customer",
            ],
            [
                "name" => "Photographer",
            ],
            [
                "name" => "Viedographer",
            ],
        ];
        foreach ($data as $key => $value) {
            Role::create($value);
        }
    }
}
