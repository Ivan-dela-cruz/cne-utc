<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Organization;
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
          $position = new Position();
          $data['url_image'] = $this->loadFile($request, 'image', 'positions', 'positions');
          $position->fill($data);
          $position->save();
          DB::commit();
          return redirect()->route('positions.index')->with('status', '¡Registro creado con exito!');
      } catch (\Exception $e) {
          DB::rollBack();
          return redirect()->route('positions.index')->with('error', '¡Error al eliminar!');
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
            return view('admin.positions.edit', compact('position'));
        }
        return redirect()->route('positions.index')->with('error', '¡Cargo no encontrado!');
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
          if ($request->file('image')) {
              $data['url_image'] = $this->loadFile($request, 'image', 'positions', 'positions');
          }
          $position->fill($data);
          $position->save();
          DB::commit();
          return redirect()->route('positions.index')->with('status', '¡Modificado  con exito!');
      } catch (\Exception $e) {
          DB::rollBack();
          return redirect()->route('positions.index')->with('error', '¡Error al eliminar!');
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
          return redirect()->route('positions.index')->with('status', '¡Elimindado  con exito!');


      } catch (\Exception $e) {
          DB::rollBack();
          return redirect()->route('positions.index')->with('error', '¡Error al eliminar!');

      }
    }
}
