<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FormController extends AdminController
{
    public function index()
    {

        $heading = 'Dotazníky';

        $forms = DB::table('t_form')->orderBy('id', 'acs')->get();

        $count = DB::table('t_form')->count();



        return view('admin.form.list', compact('heading', 'forms', 'count'));
    }

    public function detail($id)
    {

        $heading = 'Detail dotazníku číslo: ' . $id;

        $item = DB::table('t_form')->where('id', $id)->first();

        return view('admin.form.detail', compact('heading', 'item'));
    }
}
