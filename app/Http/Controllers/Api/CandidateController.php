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

    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $candidates = Candidate::filter($request->all())->orderBy('name', 'ASC')->paginate(5);
        $organizations = Organization::all();
        $positions = Position::all();
        return view('admin.candidates.index', compact('candidates', 'organizations', 'positions','keyword'));
    }


    public function create()
    {
        $organizations = Organization::orderBy('name', 'ASC')->pluck('name', 'id');
        $positions = Position::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.candidates.create', compact('organizations', 'positions'));
    }

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
            return redirect()->route('candidates.index')->with('status', '¡Registro creado con exito!');


        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('candidates.index')->with('status', 'error');
        }
    }


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

    public function edit($id)
    {
        $candidate = Candidate::find($id);
        $organizations = Organization::orderBy('name', 'ASC')->pluck('name', 'id');
        $positions = Position::orderBy('name', 'ASC')->pluck('name', 'id');
        if (isset($candidate)) {
            return view('admin.candidates.edit', compact('organizations', 'positions', 'candidate'));
        }
        return redirect()->route('candidates.index')->with('status', 'error');

    }

    public function update(Request $request, $id)
    {
        //
        try {
            DB::beginTransaction();
            $data = $request->all();
            $candidate = Candidate::find($id);
            if ($request->file('image')) {
                $data['url_image'] = $this->loadFile($request, 'image', 'candidates', 'candidates');
            }
            $candidate->fill($data);
            $candidate->save();
            DB::commit();
            return redirect()->route('candidates.index')->with('status', '¡Modificado  con exito!');


        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('candidates.index')->with('status', '¡Error al eliminar!');

        }
    }


    public function destroy($id)
    {
        //
        try {
            DB::beginTransaction();
            $candidate = Candidate::find($id);
            $candidate->delete();
            DB::commit();
            return redirect()->route('candidates.index')->with('status', '¡Elimindado  con exito!');


        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('candidates.index')->with('status', 'error');

        }
    }

}

