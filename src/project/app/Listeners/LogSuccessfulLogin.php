<?php

namespace App\Listeners;

use Auth;
use Illuminate\Auth\Events\Login;
use Session;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
		$user = Auth::user();
        if ($user->lang) {
        	Session::put('lang', $user->lang);
        }
    }
}