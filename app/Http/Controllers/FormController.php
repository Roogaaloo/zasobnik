<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FormController extends Controller
{
    public function index()
    {

        $title = 'Dotazník';

        return view('form.index', compact('title'));
    }

    public function store(Request $request)
    {

        DB::table('t_forms')->insert([
            'question1' => $request->question1,
            'question2' => $request->question2,
            'question3' => $request->question3,
            'question4' => $request->question4,
            'question5' => $request->question5,
            'question6' => $request->question6,
            'question7' => $request->question7,
            'question8' => $request->question8,
            'question9' => $request->question9,
            'question10' => $request->question10,
            'question11' => $request->question11,
            'question12' => $request->question12,
            'question13' => $request->question13,
            'question14' => $request->question14,
            'question15' => $request->question15,
        ]);

        $request->session()->flash('success', 'Děkuji. Vyplněný dotazník byl uložen do databáze.');

        return Redirect::action('FormController@index');
    }
}
