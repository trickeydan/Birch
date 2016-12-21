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
        Trickeydan\Birchcms\User::create([
            'name' => 'Test User',
            'username' => 'test',
            'email' => 'test@dev.trickey.xyz',
            'password' => bcrypt('password'),
            'group_id' => Trickeydan\Birchcms\Group::whereSlug('admin')->first()->id,
        ]);
    }
}
