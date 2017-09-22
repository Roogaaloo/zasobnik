<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index(){

        $title = 'Produkty';
                $categories = Category::all();

        return view('categories.list', compact('categories', 'title'));
    }
    public function indexAdmin(){
                $categories = Category::all();
        $heading = 'Produkty';

        return view('admin.categories.list', compact('categories','heading'));
    }

    public function show($href){



        $category = DB::table('categories')->where('status', 1)->where('href', $href)->first();

        $products = DB::table('products')->where('status', 1)->where('category', $href)->get();

        $title = $category->name;

        if($category == null){
            return Redirect::action('HomeController@error');
        }else{
            return view('categories.detail', compact('category', 'products', 'title'));
        }


    }

    public function edit($id){

        $heading = 'Upravit produkt';

        $category = DB::table('categories')->where('id', $id)->first();

        return view('admin.categories.edit', compact('category', 'heading'));
    }

    public function create(){

        $heading = 'Vytvořit produkt';

        return view('admin.categories.create', compact('heading'));
    }

    public function store(Request $request){



        DB::table('categories')
            ->insert([
                'name' => $request->title,
                'description' => $request->text,
                'perex' => $request->perex,
                'href' => $request->href,
                'status' => $request->status??0,
                'hp_status' => $request->hp_status??0,
            ]);

        $request->session()->flash('success', "Produkt byl vytvořen!");

        return Redirect::action('CategoryController@indexAdmin');
    }

    public function update(Request $request, $id){



        DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $request->title,
                'description' => $request->text,
                'perex' => $request->perex,
                'href' => $request->href,
                'status' => $request->status??0,
                'hp_status' => $request->hp_status??0,
            ]);

        $request->session()->flash('success', "Produkt byl upraven!");

        return Redirect::action('CategoryController@indexAdmin');
    }

    public function destroy(Request $request, $id)
    {
        DB::table('categories')
            ->where('id', $id)
            ->delete();

        $request->session()->flash('success', "Produkt byl smazán!");

        return Redirect::action('CategoryController@indexAdmin');
    }
}
