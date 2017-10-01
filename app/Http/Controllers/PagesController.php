<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller
{
    public function index($url) {
        $page = Pages::where('url', $url)->where('status', 1)->first();

        if($page){
            return view('pages.index', compact('page'));
        }else {
            return Redirect::action('HomeController@error');
        }

    }
}
