<?php

namespace App\Http\Controllers;

use App\Address;
use App\Client;
use App\Locality;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        $vac = compact('clients');
        session()->forget('no-results');
        return view('admin.client.index',$vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localities = DB::table('localities')->select('*')->orderBy('name')->get();
        $vac = compact('localities');
        return view('admin.client.create',$vac);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request);

        if ($request['new-locality']) {
            $this->localityValidator($request);
            $newLocality = Locality::create([
                'name' => $request['new-locality']
                ]);
            $locality = $newLocality->id;
        }else{
            $locality = $request['locality'];
        };

        $address = Address::create([
            'street'=>$request['street'],
            'number'=>$request['number'],
            'locality_id'=>$locality,
        ]);

        $client = Client::create([
            'name' => $request['name'],
            'lastname' => $request['lastname'],
            'cuit' => $request['cuit'],
            'phone' => $request['phone'],
            'address_id'=>$address->id,
        ]);
        return redirect()->route('client.index')->with('notice', 'El cliente '.Ucfirst($client->name).' '. Ucfirst($client->lastname).' ha sido creado correctamente.');
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
        $client = Client::find($id);
        $localities = DB::table('localities')->select('*')->orderBy('name')->get();
        $vac = compact('client', 'localities');
        return view('admin.client.edit', $vac);
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
        $client = Client::find($id);
        $address = Address::find($client->address_id);
        $locality = $address->locality_id;

        if ($request['new-locality']) {
            $this->localityValidator($request);
            $newLocality = Locality::create([
                'name' => $request['new-locality']
            ]);
            $locality = $newLocality->id;
        }

        $this->editValidator($request);

        $address->update([
            'street' => $request['street'],
            'number' => $request['number'],
            'locality_id' => $locality,
        ]);

        $client->update([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'cuit' => $request['cuit'],
            'phone' => $request['phone'],
        ]);
        return redirect()->route('client.index')->with('notice', 'El cliente '. Ucfirst($client->name).' '. Ucfirst($client->lastname).' ha sido editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $address = Address::where('id', $client['address_id']);
        $client->delete();
        $address->delete();
        return redirect()->route('client.index')->with('notice', 'El cliente '.$client->name.' ha sido eliminado correctamente.');
    }

    public function validator(Request $request)
    {

        $rules = [
            'name' => 'required|string|max:50',
            'lastname' => 'required|string',
            'cuit' => 'required|numeric|unique:clients',
            'phone' => 'required|numeric',
            'street' => 'required|string',
            'number' => 'required|numeric',
        ];
        $message = [
            'required' => 'El campo es obligatorio',
            'unique' => 'El Cuit ya existe en nuestra base',
            'string' => 'El campo no puede estar vacio',
            'numeric' => 'Solo se admiten números',
        ];
        return $this->validate($request, $rules, $message);
    }

    public function localityValidator(Request $request)
    {

        $rules = [
            'new-locality' => 'unique:localities,name|string|required',
        ];
        $message = [
            'unique' => 'La localidad ya existe en nuestra base',
            'string' => 'El campo no puede estar vacio',
            'required' => 'El campo es obligatorio',
        ];
        return $this->validate($request, $rules, $message);
    }

    public function editValidator(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:50',
            'lastname' => 'required|string',
            'cuit' => 'required|numeric',
            'phone' => 'required|numeric',
            'street' => 'required|string',
            'number' => 'required|numeric',
        ];
        $message = [
            'required' => 'El campo es obligatorio',
            'unique' => 'El Cuit ya existe en nuestra base',
            'string' => 'El campo no puede estar vacio',
            'numeric' => 'Solo se admiten números',
        ];
        return $this->validate($request, $rules, $message);
    }

    public function search(Request $request)
    {
        $busqueda = $request['search'];
        $clients = Client::orwhere('name',$busqueda)
        ->orwhere('lastname',$busqueda)
        ->orwhere('cuit',$busqueda)
        ->orwhere('phone',$busqueda)
        ->get();

        if($request['category'] == 'street'){
            $address = Address::where('street', $busqueda)->get();
            $clients = [];
            foreach ($address as $key => $value) {
                $client = Client::where('address_id',$value['id'])->get();
                foreach ($client as $data) {
                    $clients[] = $data;
                }

            }
        }elseif ($request['category'] == 'locality') {
            $locality = Locality::where('name', $busqueda)->get();
            $address = Address::where('locality_id', $locality[0]['id'])->get();
            $clients = [];
            foreach ($address as $key => $value) {
                $client = Client::where('address_id', $value['id'])->get();
                foreach ($client as $data) {
                   $clients[] = $data; 
                }
            }   
        }
        
        if(count($clients) == 0){
            $request->session()->flash('no-results', 'No hay resultados para la busqueda "'.$busqueda.'"');
            return view('admin.client.index');
        }

        $vac = compact('clients');
        return view('admin.client.index', $vac);
    }
}
