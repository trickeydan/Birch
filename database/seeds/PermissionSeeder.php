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
            'admin.dashboard' => [
                'name' => 'Dashboard',
                'groups' => ['default'],
            ],
            'admin.settings.index' => [
                'name' => 'Settings Index',
                'groups' => ['default'],
            ],
                'admin.settings.changepassword' => [
                    'name' => 'Change password',
                    'groups' => ['default'],
                ],
            'admin.users.index' => [
                'name' => 'Users Index',
                'groups' => ['admin'],
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
