<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\HomeText;
use Illuminate\Support\Facades\Mail;
use App\Mail\MeetingAdmin;
use App\Mail\MeetingUser;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
     * All website designed and programed by Robert Galovič.
     */

    public function index()
    {

        $banners = DB::table('banners')->where('status', 1)->orderBy('sort', 'asc')->get();
        $categories = DB::table('categories')->where('status', 1)->where('hp_status', 1)->get();
        $home_text = DB::table('home_text')->first();
        $articles = DB::table('articles')->where('status', 1)->where('hp_status', 1)->orderBy('publish_at', 'desc')->get();
        $references = DB::table('references')->where('status', 1)->where('hp_status', 1)->get();
        $partners = DB::table('partners')->where('status', 1)->get();


       return view('template.home', compact('categories','home_text', 'articles', 'references', 'partners', 'banners'));
    }

    public function error()
    {
       $heading = 'Stránka, kterou hledáte, nebyla nalezena!';

        return view('error.404', compact('heading'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addMeeting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email',
        ]);



        if($validator->fails()){
            $request->session()->flash('error_meeting', "Prosím vyplňte požadovaná pole.");

            return back()->withInput();
        }

        if(!$request->agree){
            $request->session()->flash('error_meeting', "Musíte souhlasit se zpracováním osobních údajů.");

            return back()->withInput();
        }

        $productss = [$request->bydleni, $request->pojisteni, $request->clean, $request->make, $request->store, $request->analyse];

        $products = implode('||', $productss);

        DB::table('meetings')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'local' => $request->local??'',
            'telephone' => $request->phone??'',
            'products' => $products,
            'text' => $request->text??'',
        ]);

        $name = $request->name;
        $local = $request->local;
        $phone = $request->phone;
        $email = $request->email;
        $text = $request->text;

        Mail::to('svarovsky.jiri@gmail.com')->send(new MeetingAdmin($name, $email, $text, $local, $phone, $productss));

        Mail::to($email)->send(new MeetingUser($text));

        $request->session()->flash('success', "Děkuji. Vaše žádost byla úspěšně odeslána. Budu Vás co nejdříve kontaktovat.");

        return back();
    }


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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
