<?php

namespace App\Http\Controllers\Api;

use App\Enclosure;
use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnclosureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $enclosures = Enclosure::filter($request->all())->orderBy('name', 'ASC')->paginate(10);
        
        return view('admin.enclosures.index', compact('enclosures','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $parishes = Location::orderBy('name', 'ASC')->where('type', 3)->pluck('name', 'id');
        return view('admin.enclosures.create', compact('parishes'));
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
            $m_fem = $request->meeting_fem;
            $m_ma = $request->meeting_mas;
            $total = (int)$m_fem + (int)$m_ma;
            $data['meeting_total'] = $total;
            $enclosure = new Enclosure();
            $enclosure->fill($data);
        
            $enclosure->save();
            DB::commit();
            return redirect()->route('enclosures.index')->with('status', '¡Registro creado con exito!');


        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('enclosures.index')->with('status', 'error');
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
        $enclosure = Enclosure::find($id);
        if (isset($enclosure)) {
            return response()->json([
                'status' => true,
                'enclosure' => $enclosure
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => ' no encontrado'
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
        $enclosure = Enclosure::find($id);
        $parishes = Location::orderBy('name', 'ASC')->where('type', 3)->pluck('name', 'id');
        if (isset($enclosure)) {
            return view('admin.enclosures.edit', compact('enclosure', 'parishes'));
        }
        return redirect()->route('enclosures.index')->with('status', 'error');
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
            $enclosure = Enclosure::find($id);
            $m_fem = $request->meeting_fem;
            $m_ma = $request->meeting_mas;
            $total = $m_fem + $m_ma;
            $data['meeting_total'] = $total;
            $enclosure->fill($data);
            $enclosure->save();
            DB::commit();
            return redirect()->route('enclosures.index')->with('status', '¡Modificado  con exito!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('enclosures.index')->with('status', 'error');

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
            $enclosure = Enclosure::find($id);
            $enclosure->delete();
            DB::commit();
            return redirect()->route('enclosures.index')->with('status', '¡Elimindado  con exito!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('enclosures.index')->with('status', 'error');

        }
    }
}
