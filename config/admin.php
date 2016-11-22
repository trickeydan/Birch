<?php

return [

    'menu' => [

        'admin.dashboard' => [],

        //'settingsmenu' => ['admin.settings','admin.dashboard','settings.changepassword']
    ],

    'pages' => [
        'admin.dashboard' => [
            'title' => 'Dashboard',
            'icon' => 'tachometer',
            'perm' => 'dashboard',
            'parent' => '0',
        ],
        'admin.settings' => [
            'title' => 'Settings',
            'icon' => 'cogs',
            'perm' => 'settings.index',
            'parent' => 'admin.dashboard',
        ],
            'admin.settings.changepassword' => [
                'title' => 'Change Password',
                'icon' => 'key',
                'perm' => 'settings.changepassword',
                'parent' => 'admin.settings',
            ],
    ]





];