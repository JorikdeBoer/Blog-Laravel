<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \App\Article;
use \App\User;
use \App\Paywall;

use Carbon\Carbon;

class PaywallController extends Controller
{

    public function __construct()
      {
          $this->middleware('auth', ['only' => 'store']);
      }

    public function count()
    {

     $num_articles = Category::withCount('articles')->get();
     return view('articles.blogs', compact('articles'));

    }

    public function store(Request $request)
  		{
  			$this->validate(request(), [
  				'naam' => 'required',
  				'IBAN' => 'required'
  			]);

  			$paywall = new Paywall;
  			$paywall->IBAN = $request->IBAN;
        $paywall->BIC = "";
        $paywall->mandaatid = substr(uniqid(rand(), true), 6, 6); // 6 characters long
        $paywall->mandaatdatum = new Carbon();
        $paywall->bedrag = "9.99";
        $paywall->naam = $request->naam;
        $paywall->beschrijving = "First Blog payment";
        $paywall->endtoendid = "";

        $is_saved = $paywall->save();

        if ($is_saved) {
            // success set boolean to true in user table
            $userid = Auth::id();
            User::where('id', $userid)->update(array(
                         'payed'=>true));

        } else {
            App::abort(500, 'Not saved: Error');
        }

  			return redirect("articles/create");
  	}

}
