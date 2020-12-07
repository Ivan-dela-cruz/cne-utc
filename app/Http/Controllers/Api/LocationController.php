<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LocationController extends Controller
{

    public function index(Request $request)
    {
        $provinces = Location::where('type', 1)->get();
        $cantons = Location::where('type', 2)->get();
        $parishes = Location::where('type', 3)->get();

        return view('admin.locations.index', compact('provinces', 'cantons', 'parishes'));
    }


    public function create()
    {
        $provinces = Location::orderBy('name', 'ASC')->where('type', 1)->pluck('name', 'id');
        $cantons = Location::orderBy('name', 'ASC')->where('type', 2)->pluck('name', 'id');
        return view('admin.locations.create', compact('provinces', 'cantons'));
    }


    public function store(Request $request)
    {
        $type = $request->type;
        $type_id = 0;
        switch ($type) {
            case 1:
                $type_id = 0;
                break;
            case 2:
                $type_id = $request->provincie_id;
                break;
            case 3:
                $type_id = $request->canton_id;
                break;
        }
        $data = [
            'code' => $request->code,
            'name' => $request->name,
            'long_name' => $request->long_name,
            'slug' => Str::slug($request->long_name, '-'),
            'type' => $request->type,
            'type_id' => $type_id
        ];
        $location = new Location();
        $location->fill($data);
        $location->save();
        return redirect()->route('locations.index')->with('status', '¡Registrado con exíto!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $location = Location::find($id);
        $provinces = Location::orderBy('name', 'ASC')->where('type', 1)->pluck('name', 'id');
        $cantons = Location::orderBy('name', 'ASC')->where('type', 2)->pluck('name', 'id');
        return view('admin.locations.edit', compact('provinces', 'cantons', 'location'));
    }


    public function update(Request $request, $id)
    {
        $data = array_merge($request->all());
        $location = Location::find($id);
        $location->fill($data);
        $location->save();
        return redirect()->route('locations.index')->with('status', '¡Modificado con exíto!');
    }

    public function destroy($id)
    {
        Location::find($id)->delete();
        return redirect()->route('locations.index')->with('status', '¡Eliminado con exíto!');

    }
}
