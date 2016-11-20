<?php

use Illuminate\Database\Seeder;
use Birch\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'slug' => 'default',
            'name' => 'Default'
        ]);
    }
}
