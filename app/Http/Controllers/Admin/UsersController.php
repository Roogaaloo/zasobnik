<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;

class UsersController extends Controller
{
    public function index() {

        $heading = 'Uživatelé - seznam uživatelů';

        $users = Users::all();

        return view('admin.users.index', compact('users', 'heading'));
    }
}
