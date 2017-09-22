<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    public function index() {

        $menu = DB::table('menu')->orderBy('sort', 'asc')->get();

        return view('admin.menu.list', compact('menu'));
    }

    public function create() {
        return view('admin.menu.create');
    }
    public function store(Request $request) {

        DB::table('menu')
            ->insert([
                'name' => $request->name,
                'href' => $request->href,
                'sort' => $request->sort??0,
                'status' => 1,
            ]);

        $request->session()->flash('success', "Položka byla vytvořena!");


        return Redirect::action('admin\MenuController@index');
    }

    public function update(Request $request, $id) {


        DB::table('menu')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'href' => $request->href??'',
                'sort' => $request->sort??0,
            ]);


        $request->session()->flash('success', "Položka byla upravena!");


        return Redirect::action('admin\MenuController@index');
    }


    public function hide(Request $request, $id)
    {
        DB::table('menu')
            ->where('id', $id)
            ->update([
                'status' => 0
            ]);

        $request->session()->flash('success', "Položka byla zakázána!");

        return Redirect::action('admin\MenuController@index');
    }

    public function show(Request $request, $id)
    {
        DB::table('menu')
            ->where('id', $id)
            ->update([
                'status' => 1
            ]);

        $request->session()->flash('success', "Položka byla povolena!");

        return Redirect::action('admin\MenuController@index');
    }

    public function delete(Request $request, $id)
    {
        DB::table('menu')
            ->where('id', $id)
            ->delete();

        $request->session()->flash('success', "Položka byla smazána!");

        return Redirect::action('admin\MenuController@index');
    }

}
