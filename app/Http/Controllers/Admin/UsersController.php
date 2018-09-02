<?php

namespace App\Http\Controllers\Admin;

use App\Users;

class UsersController extends AdminController
{
    public function index() {

        $heading = 'Uživatelé - seznam uživatelů';

        $users = Users::all();

        return view('admin.users.index', compact('users', 'heading'));
    }
}
