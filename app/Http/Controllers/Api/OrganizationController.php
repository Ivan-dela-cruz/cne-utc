<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{

    public function index()
    {
        $organizations = Organization::orderBy('name', 'ASC')->get();
        return view('admin.organizations.index', compact('organizations'));
    }


    public function create()
    {
        return view('admin.organizations.create');
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $organization = new Organization();
            $data['url_image'] = $this->loadFile($request, 'image', 'organizations', 'organizations');
            $organization->fill($data);
            $organization->save();
            DB::commit();
            return redirect()->route('organizations.index');

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $organization = Organization::find($id);
        if (isset($organization)) {
            return response()->json([
                'status' => true,
                'organization' => $organization
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Organizaciòn no encontrado'
        ], 404);
    }


    public function edit($id)
    {
        $organization = Organization::find($id);
        if (isset($organization)) {
            return view('admin.organizations.edit', compact('organization'));
        }
        return response()->json([
            'status' => false,
            'message' => 'organizaciòn no editado'
        ], 404);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $organization = Organization::find($id);
            if ($request->file('image')) {
                $data['url_image'] = $this->loadFile($request, 'image', 'organizations', 'organizations');
            }
            $organization->fill($data);
            $organization->save();
            DB::commit();
            return redirect()->route('organizations.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('organizations.index')->with('error', '¡Error al guardar!');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $organization = Organization::find($id);
            $organization->delete();
            DB::commit();
            return redirect()->route('organizations.index')->with('status', '¡Eliminado satisfactoriamente!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('organizations.index')->with('error', '¡Error al eliminar!');
        }
    }
}
