<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $organizations = Organization::filter($request->all())->orderBy('name', 'ASC')->paginate(4);
        return view('admin.organizations.index', compact('organizations','keyword'));
        
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
            return redirect()->route('organizations.index')->with('status', '¡Registro creado con exito!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('organizations.index')->with('status', 'error');
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
        return redirect()->route('organizations.index')->with('status', 'error');
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
            return redirect()->route('organizations.index')->with('status', '¡Registro modificado con exito!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('organizations.index')->with('status', 'error');
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
            return redirect()->route('organizations.index')->with('error', 'error');
        }
    }
}
