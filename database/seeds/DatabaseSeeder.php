<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(GroupSeeder::class);
         $this->call(PermissionSeeder::class);
         $this->call(DebugSeeder::class);
    }
}
