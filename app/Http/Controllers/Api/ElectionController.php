<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;

class ElectionController extends Controller
{

    public function index()
    {
        //
    }


    public function create(Request $request)
    {
        $province_id = $request->province_id;
        $canton_id = $request->canton_id;

        $provinces = Location::where('type', 1)->get();
        $cantons = Location::where('type', 2)->where('type_id', $province_id)->get();
        $parroquias = Location::where('type', 3)->where('type_id', $canton_id)->get();

        return response()->json([
            'provinces' => $provinces,
            'cantons' => $cantons,
            'parroquias' => $parroquias
        ], 200);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
