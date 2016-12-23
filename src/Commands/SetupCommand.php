<?php

namespace Trickeydan\Birchcms\Commands;

use Illuminate\Console\Command;
use Trickeydan\Birchcms\Group;
use Illuminate\Database\Eloquent\Model;
use Trickeydan\Birchcms\Notifications\NewUser;
use Trickeydan\Birchcms\User;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birch:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup a new birch installation.';

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
        $this->line("Birch CMS " . config('birch.version') . " Setup");
        $this->line("(C) " . date('Y') . " Dan Trickey");
        $this->line("This script will setup your Birch installation.");
        $this->line("Please ensure that you have put your database and email details in .env");

        if ($this->confirm('Do you wish to continue?',true)) {
            $this->line('Performing setup.');

            Model::unguard();

            $bar = $this->output->createProgressBar(5);
            $bar->setMessage('Publishing files.');
            $this->callSilent('vendor:publish');
            $bar->advance();

            $bar->setMessage('Setting up database tables.');
            $this->callSilent('migrate:refresh');
            $bar->advance();

            $bar->setMessage('Populating groups.');
            $default = Group::create([
                'slug' => 'default',
                'name' => 'Default'
            ]);
            Group::create([
                'slug' => 'admin',
                'name' => 'Administrator',
                'parentgroup_id' => $default->id,
            ]);
            $bar->advance();

            $bar->setMessage('Populating permissions.');
            $this->callSilent('birch:seedperms');
            $bar->advance();

            $bar->setMessage('Finalising');
            config(['auth.providers.users.model' => User::class]);
            $bar->advance();

            $bar->finish();
            echo PHP_EOL;
            $this->info('Setup steps complete');
            if ($this->confirm('Do you wish to create the administrator user?',true)) {
                $user = User::create([
                   'username' => $this->ask("Username"),
                   'name' => $this->ask("Name"),
                   'email' => $this->ask("Email Address"),
                   'password' => bcrypt($this->secret("Password")),
                   'group_id' => Group::whereSlug('admin')->first()->id,
                ]);
                //$user->notify(new NewUser('????'));
            }
            Model::reguard();
            $this->info('Thank you for using Birch CMS');
        }else{
            $this->error("Setup cancelled by user.");
        }
    }
}
