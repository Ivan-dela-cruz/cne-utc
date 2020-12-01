<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $positions = Position::orderBy('name', 'ASC')->get();
        return view('admin.positions.index',compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.positions.create');
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
        try {
            DB::beginTransaction();
            $data = $request->all();
            $positions = new Position();
            $positions->fill($data);
            $positions->save();
            DB::commit();
            return response()->json([
              'status' => true,
              'message' => 'Cargo creado correctamente'
            ], 200);
      
          } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
              'status' => false,
              'message' => $e->getMessage()
            ], 500);
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
        $position = Position::find($id);
        if (isset($position)) {
          return response()->json([
            'status' => true,
            'position' => $position
          ], 200);
        }
        return response()->json([
          'status' => false,
          'message' => 'Cargo no encontrado'
        ], 404);
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
        $position = Position::find($id);
        if (isset($position)) {
            return response()->json([
              'status' => true,
              'position' => $position
            ], 200);
          }
          return response()->json([
            'status' => false,
            'message' => 'organizaciòn no editado'
          ], 404);
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
        try {
            DB::beginTransaction();
            $data = $request->all();
            $position = Position::find($id);
            $position->fill($data);
            $position->save();
            DB::commit();
            return response()->json([
              'status' => true,
              'message' => 'Cargo modificado correctamente'
            ], 200);
      
          } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
              'status' => false,
              'message' => $e->getMessage()
            ], 500);
          }

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
        try {
            DB::beginTransaction();
            $position = Position::find($id);
            $position->delete();
            DB::commit();
            return response()->json([
              'status' => true,
              'message' => 'Cargo eliminado correctamente'
            ], 200);
      
          } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
              'status' => false,
              'message' => $e->getMessage()
            ], 500);
          }
    }
}
