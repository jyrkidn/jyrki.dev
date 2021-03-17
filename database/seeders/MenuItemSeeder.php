<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MenuItem::factory(5)->create();
    }
}
