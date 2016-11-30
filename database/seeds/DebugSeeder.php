<?php

use Illuminate\Database\Seeder;

class DebugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Birch\User::create([
            'name' => 'Test User',
            'username' => 'test',
            'email' => 'test@dev.trickey.xyz',
            'password' => bcrypt('password'),
            'group_id' => \Birch\Group::whereSlug('admin')->first()->id,
        ]);
    }
}
