<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FormController extends Controller
{
    public function index()
    {

        $heading = 'Dotazníky';

        $forms = DB::table('t_form')->orderBy('id', 'acs')->get();

        return view('admin.form.list', compact('heading', 'forms'));
    }
}
