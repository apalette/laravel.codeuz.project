<?php

namespace App\Http\Middleware;

use Closure;
use App;
use View;
use Auth;

class Language
{
	
	protected static function getList() {
		
		// app availables languages
    	$av_languages = config('lang.available');
		
		// remove inactives languages from list
		$languages = [];
		foreach ($av_languages as $lang => $status) {
			if ($status === true) {
				$languages[] = $lang;
			}
		}
		return $languages;
	}
	
	
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	$languages = self::getList();
		
    	$current = $request->session()->get('lang');
		
		if (! $current || ! in_array($current, $languages)) {
			$current = config('lang.default');
			$request->session()->put('lang', $current);
		}
		App::setLocale($current);
		
		View::share('languages', $languages);
		return $next($request);
    }
}
