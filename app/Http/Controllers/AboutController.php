<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {


        $about = DB::table('about')->first();

        $title = 'Proč se mnou';

        $partners = DB::table('partners')->where('status', 1)->get();

        $category = array();

        foreach($partners as $p){
            if($p->category){
                if(!in_array($p->category, $category)){
                    array_push($category, $p->category);
                }
            }
         }

        return view('template.about', compact('about','partners', 'category', 'title'));
    }

    public function indexAdmin()
    {
        $about = DB::table('about')->first();

        $heading = 'Proč se mnou';

        return view('admin.about.list', compact('about','partners', 'category', 'heading'));
    }

    public function indexAdminPartners()
    {
        $pojisteni = DB::table('partners')->where('category', 'Pojištění')->get();
        $stavebni = DB::table('partners')->where('category', 'Stavební spoření')->get();
        $penze = DB::table('partners')->where('category', 'Penze')->get();
        $banky = DB::table('partners')->where('category', 'Banky')->get();

        $heading = 'Partneři';

        return view('admin.partners.list', compact('pojisteni', 'stavebni', 'uvery', 'penze', 'banky', 'heading'));
    }

    public function update(Request $request)
    {
        DB::table('about')
            ->where('id', 1)
            ->update([
                'text' => $request->text,
            ]);

        if ($request->file('image')) {
            DB::table('about')
                ->where('id', 1)
                ->update([
                    'image' => '/img/about/' . date("YmdHis") . $request->image->getClientOriginalName(),
                ]);
            $request->file('image')->move('img/about', date("YmdHis") . $request->image->getClientOriginalName());
        }

        $request->session()->flash('success', "Sekce proč se mnou upravena!");

        return Redirect::action('AboutController@indexAdmin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('banky')) {
            DB::table('partners')
                ->insert([
                    'image' => '/img/partners/' . date("YmdHis") . $request->banky->getClientOriginalName(),
                    'category' => 'Banky',
                    'name' => '',
                    'text' => '',
                    'href' => '',
                    'status' => 1,
                ]);
            $request->file('banky')->move('img/partners', date("YmdHis") . $request->banky->getClientOriginalName());
        }

        if ($request->file('pojisteni')) {
            DB::table('partners')
                ->insert([
                    'image' => '/img/partners/' . date("YmdHis") . $request->pojisteni->getClientOriginalName(),
                    'category' => 'Pojištění',
                    'name' => '',
                    'text' => '',
                    'href' => '',
                    'status' => 1,
                ]);
            $request->file('pojisteni')->move('img/partners', date("YmdHis") . $request->pojisteni->getClientOriginalName());
        }

        if ($request->file('penze')) {
            DB::table('partners')
                ->insert([
                    'image' => '/img/partners/' . date("YmdHis") . $request->penze->getClientOriginalName(),
                    'category' => 'Penze',
                    'name' => '',
                    'text' => '',
                    'href' => '',
                    'status' => 1,
                ]);
            $request->file('penze')->move('img/partners', date("YmdHis") . $request->penze->getClientOriginalName());
        }

        if ($request->file('stavebni')) {
            DB::table('partners')
                ->insert([
                    'image' => '/img/partners/' . date("YmdHis") . $request->stavebni->getClientOriginalName(),
                    'category' => 'Stavební spoření',
                    'name' => '',
                    'text' => '',
                    'href' => '',
                    'status' => 1,
                ]);
            $request->file('stavebni')->move('img/partners', date("YmdHis") . $request->stavebni->getClientOriginalName());
        }

        $request->session()->flash('success', "Partneři byli upraveni!");

        return Redirect::action('AboutController@indexAdminPartners');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

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
        DB::table('partners')
            ->where('id', $id)
            ->delete();

        $request->session()->flash('success', "Partner byl smazán!");

        return Redirect::action('AboutController@indexAdminPartners');
    }
}
