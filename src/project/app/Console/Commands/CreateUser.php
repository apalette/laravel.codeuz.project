<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {first_name} {last_name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an user';

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
    	$user = new User;
		$user->first_name = $this->argument('first_name');
		$user->last_name = $this->argument('last_name');
		$user->email = $this->argument('email');
		$user->password = bcrypt($this->argument('password'));
		if ($user->save()) {
			$this->info('User created !');
		}
		else {
			$this->error('Error');
		}
    }
}