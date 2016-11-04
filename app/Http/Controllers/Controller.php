<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;
use App;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct()
    {
    	$this->middleware(function ($request, $next) {
		if(session()->has( 'locale' ))
		{
			App::setLocale(Session::get('locale'));
		}

		return $next($request);
		});
	}

    public function getlanguage($locale)
    {
        Session::put('locale', $locale);
        App::setLocale($locale);

    	return redirect()->back();
    }
}
