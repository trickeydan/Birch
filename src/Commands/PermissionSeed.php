<?php

namespace Trickeydan\Birchcms\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Trickeydan\Birchcms\Permission;
use Trickeydan\Birchcms\Group;

class PermissionSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birch:seedperms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add the default permissions data to the database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Model::unguard();
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
            'admin.groups.update' => [
                'name' => 'Update Group',
                'groups' => ['admin'],
            ],
            'admin.groups.members' => [
                'name' => 'View Group Members',
                'groups' => ['admin'],
            ],
            'admin.groups.members.remove' => [
                'name' => 'Remove Group Members',
                'groups' => ['admin'],
            ],
            'admin.groups.permissions' => [
                'name' => 'View Group Permissions',
                'groups' => ['admin'],
            ],
            'admin.groups.delete' => [
                'name' => 'Delete Group',
                'groups' => ['admin'],
            ],
        ];
        Permission::truncate();
        DB::table('group_permission')->truncate();
        foreach ($permissions as $slug => $parameters){
            $perm = Permission::create([
                'slug' => $slug,
                'name' => $parameters['name'],
            ]);
            foreach($parameters['groups'] as $group){
                $perm->groups()->attach(Group::whereSlug($group)->first()->id);
            }
        }
        Model::reguard();
    }
}
