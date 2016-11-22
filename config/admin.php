<?php

return [

    'menu' => [

        'admin.dashboard' => [],

        'admin.users.index' => [],

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
    ]





];