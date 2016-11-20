<?php

use Illuminate\Database\Seeder;
use Birch\Permission;
use Birch\Group;

class PermissionSeeder extends Seeder
{
    /**
     * Add the initial permissions structure
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'dashboard' => [
                'name' => 'Dashboard',
                'groups' => ['default'],
            ],
            'settings.index' => [
                'name' => 'Settings Index',
                'groups' => ['default'],
            ],
            'settings.changepassword' => [
                'name' => 'Change password',
                'groups' => ['default'],
            ],
        ];
        foreach ($permissions as $slug => $parameters){
            $perm = Permission::create([
                'slug' => $slug,
                'name' => $parameters['name'],
            ]);
            foreach($parameters['groups'] as $group){
                $perm->groups()->attach(Group::whereSlug($group)->first()->id);
            }
        }
    }
}
