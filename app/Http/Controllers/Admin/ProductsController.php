<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends AdminController
{

    public function index(){

        $title = 'Produkty';
        $products = Product::all();

        return view('admin.products.list', compact('products', 'title'));
    }

    public function show($href){

        $products = new Product();
        $products = $products->where('status', 1)->where('category', $href)->get();

        $title = $products->name;

        if($products == null){
            return Redirect::action('HomeController@error');
        }else{
            return view('products.detail', compact('category', 'products', 'title'));
        }


    }

    public function edit($id){

        $heading = 'Upravit produkt';

        $product = new Product();
        $product = $product->where('id', $id)->first();

        return view('admin.products.edit', compact('product', 'heading'));
    }

    public function create(){

        $heading = 'Vytvořit produkt';

        return view('admin.products.create', compact('heading'));
    }

    public function store(Request $request){



        $product = new Product();
        $product = $product->insert([
                'name' => $request->title,
                'description' => $request->text,
                'perex' => $request->perex,
                'href' => $request->href,
                'status' => $request->status??0,
            ]);

        $request->session()->flash('success', "Produkt byl vytvořen!");

        return Redirect::route('admin.products.index');
    }

    public function update(Request $request, $id){



        $product = new Product();
        $product = $product->where('id', $id)
            ->update([
                'name' => $request->title,
                'description' => $request->text,
                'perex' => $request->perex,
                'href' => $request->href,
                'status' => $request->status??0,
            ]);

        $request->session()->flash('success', "Produkt byl upraven!");

        return Redirect::route('admin.products.index');
    }

    public function destroy(Request $request, $id)
    {
        $product = new Product();
        $product = $product->where('id', $id)
            ->delete();

        $request->session()->flash('success', "Produkt byl smazán!");

        return Redirect::route('admin.products.index');
    }
}
