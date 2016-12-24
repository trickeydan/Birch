<?php

return [

    'menu' => [

        'admin.dashboard' => [],

        'admin.users.index' => [],
        'admin.groups.index' => [],
        'admin.pages.index' => [],

    ],

    'pages' => [
        'admin.dashboard' => [
            'title' => 'Dashboard',
            'icon' => 'tachometer',
            'perm' => 'admin.dashboard',
            'parent' => '0',
        ],
        'admin.settings.index' => [
            'title' => 'Settings',
            'icon' => 'cogs',
            'perm' => 'admin.settings.index',
            'parent' => 'admin.dashboard',
        ],
            'admin.settings.update' => [
                'title' => 'Update Details',
                'icon' => 'pencil',
                'perm' => 'admin.settings.update',
                'parent' => 'admin.settings.index',
            ],
            'admin.settings.changepassword' => [
                'title' => 'Change Password',
                'icon' => 'key',
                'perm' => 'admin.settings.changepassword',
                'parent' => 'admin.settings.index',
            ],
        'admin.users.index' => [
            'title' => 'Users',
            'icon' => 'users',
            'perm' => 'admin.users.index',
            'parent' => 'admin.dashboard',
        ],
            'admin.users.create' => [
                'title' => 'Create User',
                'icon' => 'user-plus',
                'perm' => 'admin.users.create',
                'parent' => 'admin.users.index',
            ],
            'admin.users.view' => [
                'title' => 'View User',
                'icon' => 'user',
                'perm' => 'admin.users.view',
                'parent' => 'admin.users.index',
            ],
            'admin.users.update' => [
                'title' => 'Update User',
                'icon' => 'user',
                'perm' => 'admin.users.view',
                'parent' => 'admin.users.index',
            ],
            'admin.users.sendresetlink' => [
                'title' => 'Send Reset Link',
                'icon' => 'user',
                'perm' => 'admin.users.sendresetlink',
                'parent' => 'admin.users.index',
            ],
        'admin.groups.index' =>[
            'title' => 'Groups',
            'icon' => 'lock',
            'perm' => 'admin.groups.index',
            'parent' => 'admin.dashboard',
        ],
            'admin.groups.create' =>[
                'title' => 'Create Group',
                'icon' => 'lock',
                'perm' => 'admin.groups.create',
                'parent' => 'admin.groups.index',
            ],
            'admin.groups.view' =>[
                'title' => 'View Group',
                'icon' => 'lock',
                'perm' => 'admin.groups.view',
                'parent' => 'admin.groups.index',
            ],
            'admin.groups.update' =>[
                'title' => 'Update Group',
                'icon' => 'lock',
                'perm' => 'admin.groups.update',
                'parent' => 'admin.groups.view',
            ],
            'admin.groups.members' =>[
                'title' => 'View Group Members',
                'icon' => 'lock',
                'perm' => 'admin.groups.members',
                'parent' => 'admin.groups.view',
            ],
            'admin.groups.members.remove' =>[
                'title' => 'Remove Group Members',
                'icon' => 'lock',
                'perm' => 'admin.groups.members.remove',
                'parent' => 'admin.groups.view',
            ],
            'admin.groups.permissions' =>[
                'title' => 'View Group Permissions',
                'icon' => 'lock',
                'perm' => 'admin.groups.permissions',
                'parent' => 'admin.groups.view',
            ],
            'admin.groups.delete' =>[
                'title' => 'Dlete Group',
                'icon' => 'lock',
                'perm' => 'admin.groups.delete',
                'parent' => 'admin.groups.view',
            ],
        'admin.pages.index' =>[
            'title' => 'Pages',
            'icon' => 'file-o',
            'perm' => 'admin.pages.index',
            'parent' => 'admin.dashboard',
        ],
    ]





];