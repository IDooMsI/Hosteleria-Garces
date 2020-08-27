<?php

namespace App\Http\Controllers;

use App\Client;
use App\Image;
use App\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $hoy = Carbon::today();
        $worksToDay = Work::whereDate('created_at', $hoy)->get();
        $vac = compact('works','worksToDay');
        session()->forget('no-results');
        return view('admin.work.index', $vac);
    }

    public function asignee($id)
    {
        $client = Client::find($id);
        $work = Work::create([
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
        $images = Image::where('work_id',$work->id)->get();
        $vac = compact('work','client','images');
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
        $work = Work::find($id);
        $this->createImage($request, $work);
        $work->update([
            'fc_number' => $request['number'],
            'price' => $request['price'],
            'user_id' => $request['user'],
        ]);

        return view('admin.work.index')->with('notice','El trabajo se finalizo correctamente');
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

    public function search(Request $request)
    {
        $busqueda = $request['search'];
        $works = Work::orwhere('id', $busqueda)
        ->orwhere('created_at', $busqueda)
        ->get();

        if ($request['client']) {
            $clients = Client::where('name', $busqueda)->get();
            $works = [];
            foreach ($clients as $key => $value) {
                $work = Work::where('client_id', $value['id'])->get();
                foreach ($work as $data) {
                    $works[] = $data;
                }
            }
        }

        if (count($works) == 0) {
            $request->session()->flash('no-results', 'No hay resultados para la busqueda "' . $busqueda . '"');
            if (Auth::user()->admin == 333) {
                return view('admin.work.index');
            }else{
                return view('admin.work.index');
            }
        }

        $vac = compact('works');
        if (Auth::user()->admin == 333) {
            return view('admin.work.index', $vac);
        }else{
            return view('admin.work.index', $vac);
        }
    }

    public function createImage(Request $request, Work $work)
    {
        $position = 0;
        foreach ($request['img'] as $key) {
            $file = $key;
            $name = $request['client'] . "-trabajo N°" . $work->id ."-factura N°-". $request['number']."-". $position++ . "." . $file->extension();
            $path = 'works/' . $name;
            $path = $file->storeAs('work', $name, 'public');
            
            // move_uploaded_file($file, "../public_html/storage/$path");
            $image = Image::create([
                'name' => $path,
                'work_id' => $work->id,
            ]);
        }
        return $image;
    }
    
}
