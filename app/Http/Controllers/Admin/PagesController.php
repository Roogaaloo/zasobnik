<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Pages;
use Illuminate\Support\Facades\Validator;
use TwitterPhp\Connection\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function index() {

        $heading = 'Stránky - výpis';

        $pages = Pages::all();

        return view('admin.pages.index', compact('pages', 'heading'));

    }


    public function create(){

        $heading = 'Vytvořit stránku';

        return view('admin.pages.create', compact('heading'));
    }

    public function edit($id){

        $heading = 'Upravit stránku';

        $item = Pages::where('id', $id)->first();

        return view('admin.pages.edit', compact('heading', 'item'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('error', "Prosím vyplňte požadovaná pole.");

            return back()->withInput();
        } else {

            $pages = new Pages;

            if ($request->file('image')) {
                $pages->image = '/img/pages/' . date("YmdHis") .$request->image->getClientOriginalName();
                $request->file('image')->move('img/pages', date("YmdHis") .$request->image->getClientOriginalName());
            }

            $pages->title = $request->title;
            $pages->perex = $request->perex??'';
            $pages->url = $request->url;
            $pages->description = $request->description??'';

            $pages->publish_at = $request->publish_at??Carbon::now();
            $pages->status = $request->status??1;
            $pages->hp_status = $request->hp_status??0;
            $pages->user_id = Auth::user()->id;
            $pages->meta_title = $request->meta_title;
            $pages->meta_description = $request->meta_description;
            $pages->meta_keywords = $request->meta_keywords;
            $pages->og_title = $request->og_title;
            $pages->og_type = $request->og_type;
            $pages->og_url = $request->og_url;
            $pages->og_description = $request->og_description;
            $pages->og_image = $request->og_image;

            $pages->save();

            $request->session()->flash('success', "Stránka byla vytvořena!");

            return Redirect::action('Admin\PagesController@index');
        }
    }

    public function update(Request $request, $id){

        Pages::where('id', $id)
            ->update([
                'title' => $request->title,
                'perex' => $request->perex??'',
                'url' => $request->url,
                'description' => $request->description??'',
              //  'publish_at' => $request->publish_at,
                'status' => $request->status??0,
                'hp_status' => $request->hp_status??0,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
                'og_title' => $request->og_title,
                'og_type' => $request->og_type,
                'og_url' => $request->og_url,
                'og_description' => $request->og_description,
            ]);

        if ($request->file('image')) {
            Pages::where('id', $id)
                ->update([
                    'image' => '/img/pages/' . date("YmdHis") .$request->image->getClientOriginalName(),
                ]);
            $request->file('image')->move('img/pages', date("YmdHis") .$request->image->getClientOriginalName());
        }

        $request->session()->flash('success', "Stránka byla upravena!");

        return Redirect::action('Admin\PagesController@index');
    }

    public function destroy(Request $request, $id)
    {

        $page = Pages::where('id', $id);

        $page->delete();

        $request->session()->flash('success', "Stránka byla smazána!");

        return Redirect::action('Admin\PagesController@index');
    }
}
