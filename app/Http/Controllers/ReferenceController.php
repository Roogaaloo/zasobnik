<?php

namespace App\Http\Controllers;

use App\Mail\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class ReferenceController extends Controller
{
    public function index()
    {
        $title = 'Reference';

        $references = DB::table('references')->where('status', 1)->orderBy('created_at', 'desc')->get();

        return view('reference.list', compact('references', 'title'));
    }

    public function indexAdmin()
    {
        $references = DB::table('references')->orderBy('created_at', 'desc')->get();

        return view('admin.reference.list', compact('references'));
    }


    public function edit($id)
    {
        $heading = 'Upravit referenci';

        $reference = DB::table('references')->where('id', $id)->first();

        return view('admin.reference.edit', compact('reference', 'heading'));
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
        DB::table('references')
            ->where('id', $id)
            ->update([
                'text' => $request->text,
                'date' => $request->date,
                'status' => $request->status??0,
                'hp_status' => $request->hp_status??0,
            ]);

        $request->session()->flash('success', "Reference byla upravena!");

        return Redirect::action('ReferenceController@indexAdmin');
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
        }





        DB::table('references')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text,
            'created_at' => date("Y-m-d H:i:s"),
        ]);

        $name = $request->name;

        Mail::to('svarovsky.jiri@gmail.com')->send(new Reference($name));

        $request->session()->flash('success', "Děkuji. Recenze byla přijata ke schválení.");

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($href)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
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
        DB::table('references')
            ->where('id', $id)
            ->delete();

        $request->session()->flash('success', "Reference byla smazána!");

        return Redirect::action('ReferenceController@indexAdmin');
    }
}
