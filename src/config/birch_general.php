<?php

return [
    'admin_url' => 'admin',
    'enable_password_reset' => env('SITE_ENABLE_PASSWORD_RESET',true),
    'enable_user_registration' => env('SITE_USER_REGISTRATION',false),
    'site_title' => env('SITE_TITLE','Birch CMS'),
    'version' => 'v0.0.1-alpha.4',
];