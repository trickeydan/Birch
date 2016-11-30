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
        $default = Group::create([
            'slug' => 'default',
            'name' => 'Default'
        ]);

        Group::create([
            'slug' => 'admin',
            'name' => 'Administrator',
            'parentgroup_id' => $default->id,
        ]);
    }
}
