<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BannerController extends AdminController
{
    public function indexAdmin()
    {
        $banners = DB::table('banners')->orderBy('sort', 'asc')->get();

        return view('admin.banner.list', compact('banners'));
    }


    public function edit($id){

        $heading = 'Upravit banner';

        $banner = DB::table('banners')->where('id', $id)->first();

        return view('admin.banner.edit', compact('banner', 'heading'));
    }

    public function update(Request $request, $id){

        DB::table('banners')
            ->where('id', $id)
            ->update([
                'title' => $request->title,
                'perex' => $request->perex,
                'sort' => $request->sort??0,
                'status' => $request->status??0,
                'created_at' => date("Y-m-d H:i:s"),
            ]);

        if ($request->file('image')) {
            DB::table('banners')
                ->where('id', $id)
                ->update([
                    'image' => '/img/banners/' . date("YmdHis") .$request->image->getClientOriginalName(),
                ]);
            $request->file('image')->move('img/banners', date("YmdHis") .$request->image->getClientOriginalName());
        }

        $request->session()->flash('success', "Banner byl upraven!");

        return Redirect::action('BannerController@indexAdmin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $heading = 'Vytvořit banner';

        return view('admin.banner.create', compact('heading'));
    }

    public function store(Request $request){
        DB::table('banners')
            ->insert([
                'title' => $request->title,
                'perex' => $request->perex,
                'sort' => $request->sort??0,
                'status' => $request->status??0,
                'created_at' => date("Y-m-d H:i:s"),
            ]);

        if ($request->file('image')) {
            DB::table('banners')
                ->where('created_at', date("Y-m-d H:i:s"))
                ->update([
                    'image' => '/img/banners/' . date("YmdHis") . $request->image->getClientOriginalName(),
                ]);
            $request->file('image')->move('img/banners', date("YmdHis") . $request->image->getClientOriginalName());
        }


        $request->session()->flash('success', "Banner byl vytvořen!");

        return Redirect::action('BannerController@indexAdmin');
    }


    public function destroy(Request $request, $id)
    {
        DB::table('banners')
            ->where('id', $id)
            ->delete();

        $request->session()->flash('success', "Banner byl smazán!");

        return Redirect::action('BannerController@indexAdmin');
    }
}
