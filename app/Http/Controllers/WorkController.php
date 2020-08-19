<?php

namespace App\Http\Controllers;

use App\Client;
use App\Image;
use App\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::all();
        $vac = compact('works');
        session()->forget('no-results');
        return view('admin.work.index', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     // return view('admin.work.create');
    // }

    public function asignee($id)
    {
        $client = Client::find($id);
        $work = Work::create([
            'fc_number' =>'trabajo no finalizado',
            'price'=>'trabajo no finalizado',
            'client_id'=>$client->id,
        ]);

        return redirect()->route('client.index')->with('notice', 'Se creo el trabajo N° '. $work->id . ' para el cliente ' . Ucfirst($client->name) . ' ' . Ucfirst($client->lastname));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $work = Work::find($id);
        $client = Client::find($work->client_id);
        $images = Image::where('work_id',$work->id);
        $vac = compact('work','client','clients');
        return view('admin.work.show',$vac);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Work::find($id);
        $vac = compact('work');
        return view('admin.work.edit',$vac);
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
