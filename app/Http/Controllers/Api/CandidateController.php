<?php

namespace App\Http\Controllers\Api;

use App\Candidate;
use App\Http\Controllers\Controller;
use App\Organization;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $candidates = Candidate::orderBy('name', 'ASC')->get();
        $organizations = Organization::all();
        $positions = Position::all();
        return view('admin.candidates.index', compact('candidates', 'organizations', 'positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $organizations = Organization::orderBy('name', 'ASC')->get(['name','id']);;
        $positions = Position::orderBy('name', 'ASC')->get(['name','id']);
        return view('admin.candidates.create', compact('organizations', 'positions'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        DB::beginTransaction();
        $data = $request->all();
        $candidate = new Candidate();
        $data['url_image'] = $this->loadFile($request, 'image', 'candidates', 'candidates');
        $candidate->fill($data);
        $candidate->save();
        DB::commit();

        return $this->index();

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
        $candidate = Candidate::find($id);
        if (isset($candidate)) {
          return response()->json([
            'status' => true,
            'candidate' => $candidate
          ], 200);
        }
        return response()->json([
          'status' => false,
          'message' => 'Candidato no encontrado'
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
        $candidate = Candidate::find($id);
    $organizations = Organization::all();
    $positions = Position::all();
    if (isset($candidate)) {
      return response()->json([
        'status' => true,
        'candidate' => $candidate,
        'organizations' => $organizations,
        'positions' => $positions
      ], 200);
    }
    return response()->json([
      'status' => false,
      'message' => 'candidato no encontrado'
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
            $candidate = Candidate::find($id);
            $candidate->fill($data);
            $candidate->save();
            DB::commit();
            return response()->json([
              'status' => true,
              'message' => 'Candidato modificado correctamente'
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
            $candidate = Candidate::find($id);
            $candidate->delete();
            DB::commit();
            return response()->json([
              'status' => true,
              'message' => 'Candidato eliminado correctamente'
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

