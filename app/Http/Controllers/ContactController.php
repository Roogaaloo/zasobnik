<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactAdmin;
use App\Mail\ContactUser;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $title = 'Kontakt | Ing. Jiří Svarovský';

        return view('template.contact', compact('title'));
    }

    public function indexAdmin()
    {


        $heading = 'Kontakt';

        $contact = DB::table('contact')->first();

        $home_text = DB::table('home_text')->first();

        return view('admin.contact.list', compact('heading', 'contact', 'home_text'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'text' => 'required|max:255',
        ]);

        if($validator->fails()){
            $request->session()->flash('error', "Prosím vyplňte požadovaná pole.");

            return back()->withInput();
        }else{
            DB::table('forms')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'text' => $request->text,
            ]);

            $name = $request->name;
            $email = $request->email;
            $text = $request->text;


            Mail::to('svarovsky.jiri@gmail.com')->send(new ContactAdmin($name, $email, $text));

            Mail::to($email)->send(new ContactUser($text));

            $request->session()->flash('success', "Děkuji. Vaše zpráva byla úspěšně odeslána. Budu Vás co nejdříve kontaktovat.");

            return back();
        }


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
    public function update(Request $request)
    {
        DB::table('contact')
            ->where('id', 1)
            ->update([
                'text' => $request->text,
                'telephone' => $request->phone,
                'email' => $request->email,
                'name' => $request->name,
            ]);

        DB::table('home_text')
            ->where('id', 1)
            ->update([
                'heading' => $request->heading,
                'text' => $request->text,   
            ]);

        if ($request->file('image')) {
            DB::table('home_text')
                ->where('id', 1)
                ->update([
                    'media' => '/img/about/' . date("YmdHis") . $request->image->getClientOriginalName(),
                ]);
            $request->file('image')->move('img/about', date("YmdHis") . $request->image->getClientOriginalName());
        }

        $request->session()->flash('success', "Sekce kontakt upravena!");

        return Redirect::action('ContactController@indexAdmin');
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
