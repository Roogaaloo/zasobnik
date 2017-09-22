<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $title = 'Blog';

        $articles = DB::table('articles')->where('status', 1)->orderBy('publish_at', 'desc')->get();

        return view('blog.list', compact('articles', 'title'));
    }

    public function indexAdmin()
    {
        $articles = DB::table('articles')->orderBy('publish_at', 'desc')->get();

        return view('admin.blog.list', compact('articles'));
    }


    public function edit($id){

        $heading = 'Upravit článek';

        $article = DB::table('articles')->where('id', $id)->first();

        return view('admin.blog.edit', compact('article', 'heading'));
    }

    public function update(Request $request, $id){

        DB::table('articles')
            ->where('id', $id)
            ->update([
                'title' => $request->title,
                'text' => $request->text,
                'perex' => $request->perex,
                'date' => $request->date,
                'category' => $request->category,
                'href' => $request->href,
                'status' => $request->status??0,
                'hp_status' => $request->hp_status??0,
                'publish_at' => $request->publish_at,
            ]);

        if ($request->file('image')) {
            DB::table('articles')
                ->where('id', $id)
                ->update([
                    'image' => '/img/articles/' . date("YmdHis") . $request->image->getClientOriginalName(),
                ]);
            $request->file('image')->move('img/articles', date("YmdHis") . $request->image->getClientOriginalName());
        }

        $request->session()->flash('success', "Článek byl upraven!");

        return Redirect::action('BlogController@indexAdmin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $heading = 'Vytvořit článek';

        return view('admin.blog.create', compact('heading'));
    }

    public function store(Request $request){
        DB::table('articles')
            ->insert([
                'title' => $request->title,

                'text' => $request->text,
                'perex' => $request->perex,
                'category' => $request->category,
                'date' => $request->date,

                'href' => $request->href,
                'status' => $request->status??0,
                'hp_status' => $request->hp_status??0,
                'created_at' => date("Y-m-d H:i:s"),
                'publish_at' => $request->publish_at,
            ]);

        if ($request->file('image')) {
            DB::table('articles')
                ->insert([
                    'image' => '/img/articles/' . date("YmdHis") . $request->image->getClientOriginalName(),
                ]);
            $request->file('image')->move('img/articles', date("YmdHis") . $request->image->getClientOriginalName());
        }


        $request->session()->flash('success', "Článek byl vytvořen!");

        return Redirect::action('BlogController@indexAdmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($href)
    {

        $article = DB::table('articles')->where('status', 1)->where('href', $href)->first();

        $title = $article->title;

        $articles = DB::table('articles')->where('status', 1)->get();

        if($article == null){
            return Redirect::action('HomeController@error');
        }else{
            return view('blog.detail', compact('article', 'articles', 'title'));
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        DB::table('articles')
            ->where('id', $id)
            ->delete();

        $request->session()->flash('success', "Článek byl smazán!");

        return Redirect::action('BlogController@indexAdmin');
    }
}
