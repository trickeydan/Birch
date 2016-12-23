# Birch
Birch CMS is a simple to use, yet powerful system to make collaborative websites.

##Status: First Alpha Release
This software is in the very early stages of development and may take some time to be ready for use in production.

One of the primary goals of Birch is to make web development easier, as this is what made me decide to begin developing it, having found that the alternatives were overcomplex.

Birch uses a combination of file based configuration and database storage for the application

##How to install
Download a clean install of Laravel 5.3
Install the Birch package by running

`composer require trickeydan/birchcms`

Add the BirchServiceProvider to the `config/app.php`

Add your database and email details to `.env`

Delete all files from `database/migrations`
Delete the file `app/User.php`
Edit `config/auth.php` - Change `\App\User::class` to `\Trickeydan\Birchcms\User::class` (Until Customer UserProvider is written)

Run `php artisan birch:setup` and follow the instructions.

Enjoy the features of Birch.