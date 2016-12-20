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
                'admin.settings.update' => [
                    'name' => 'Update Own Info',
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
                'admin.users.create' => [
                    'name' => 'Create Users',
                    'groups' => ['admin'],
                ],
                'admin.users.view' => [
                    'name' => 'View Users',
                    'groups' => ['admin'],
                ],
                'admin.users.update' => [
                    'name' => 'Update User Details',
                    'groups' => ['admin'],
                ],
                'admin.users.sendresetlink' => [
                    'name' => 'Send Password Reset Link',
                    'groups' => ['admin'],
                ],
            'admin.groups.index' => [
                'name' => 'Groups Index',
                'groups' => ['admin'],
            ],
                'admin.groups.create' => [
                    'name' => 'Create Groups',
                    'groups' => ['admin'],
                ],
                'admin.groups.view' => [
                    'name' => 'View Group',
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
