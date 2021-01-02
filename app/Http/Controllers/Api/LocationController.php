<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class LocationController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $type = $request->query('type');
        if(!is_null($type)){
            $locations = Location::where('type', $type)
            ->where('name', 'like', "%{$keyword}%")
            ->paginate(10);
        }else{
            $locations = Location::where('type', 1)->paginate(10);
            $type = "1";
        }
        return view('admin.locations.index', compact('locations', 'keyword','type'));
    }


    public function create()
    {
        $provinces = Location::orderBy('name', 'ASC')->where('type', 1)->pluck('name', 'id');
        $cantons = Location::orderBy('name', 'ASC')->where('type', 2)->pluck('name', 'id');
        return view('admin.locations.create', compact('provinces', 'cantons'));
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
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
            DB::commit();
            return redirect()->route('locations.index')->with('status', '¡Registro creado con exito!');


        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('locations.index')->with('status', 'error');
        }
    }


    public function show($id)
    {
        
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
        try {
            DB::beginTransaction();
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
            $location = Location::find($id);
            $location->fill($data);
            $location->save();
        
            DB::commit();
            return redirect()->route('locations.index')->with('status', '¡Registro modificado con exito!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('locations.index')->with('status', 'error');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Location::find($id)->delete();
            DB::commit();
            return redirect()->route('locations.index')->with('status', '¡Registro eliminado con exito!');


        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('locations.index')->with('status', 'error');
        }
        

    }
    public function changeStatus($id)
    {
        $location = Location::find($id);
        if($location->status==1){
           
            $location->status = 0;
        }else{
           
            $location->status = 1;
        }
        $location->save();

        return response()->json([
            'status'=>true,
            'location'=>$location
        ],200);
        
    }
}
