<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class AppController extends Controller
{
    /**
     * Change the language
     *
     * @return \Illuminate\Http\Response
     */
    public function postLanguage(Request $request)
    {
    	// app availables languages
    	$av_languages = config('lang.available');
		
		// remove inactives languages from list
		$languages = [];
		foreach ($av_languages as $lang => $status) {
			if ($status === true) {
				$languages[] = $lang;
			}
		}
		
		if ($request->lang_value && in_array($request->lang_value, $languages)) {
			$request->session()->put('lang', $request->lang_value);
			$user = Auth::user();
			if ($user) {
				$user->lang = $request->lang_value;
				$user->save();
			}
		}
		
        return redirect($request->lang_url);
    }
}