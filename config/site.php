<?php
return [

    'title' => env('SITE_TITLE','Birch CMS'),

    'enable_user_registration' => env('SITE_USER_REGISTRATION',false),
    'enable_password_reset' => env('SITE_ENABLE_PASSWORD_RESET',true),
    'admin_url' => env('SITE_ADMIN_URL','admin'),

];