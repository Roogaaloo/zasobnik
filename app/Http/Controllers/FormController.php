<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FormController extends Controller
{
    public function index()
    {
        $title = 'Anketa Toxoplazmóza';

        return view('form.index', compact('title'));
    }

    public function store(Request $request)
    {

        DB::table('t_form')->insert([
            'question1' => $request->sex??'Nevyplněno',
            'question2' => $request->age??'Nevyplněno',
            'question3' => $request->owner??'Nevyplněno',
            'question4' => $request->heard??'Nevyplněno',
            'question5' => $request->where??'Nevyplněno',
            'question6' => $request->transfer_to??'Nevyplněno',
            'question7' => $request->health??'Nevyplněno',
            'question8' => implode(', ',$request->cause??array('Nevyplněno')),
            'question9' => $request->class??'Nevyplněno',
            'question10' => $request->pregnant??'Nevyplněno',
            'question11' => $request->touch??'Nevyplněno',
            'question12' => $request->clean??'Nevyplněno',
            'question13' => $request->suffering??'Nevyplněno',
            'question14' => $request->toxic??'Nevyplněno',
            'question15' => $request->income??'Nevyplněno',
            'question16' => implode(', ',$request->transfer??array('Nevyplněno')),
            'question17' => $request->cure??'Nevyplněno',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $request->session()->flash('success', 'Děkuji. Vyplněný dotazník byl uložen do databáze.');

        return Redirect::action('FormController@index');
    }
}
