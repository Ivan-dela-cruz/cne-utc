<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $organizations = Organization::orderBy('name', 'ASC')->get();
        return view('admin.organizations.index', compact('organizations'));
    }


    public function create()
    {

        return view('admin.organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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

            return redirect('organizations-list');

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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
        $organization = Organization::find($id);
        if (isset($organization)) {
            return view('admin.organizations.edit',compact('organization'));
        }
        return response()->json([
            'status' => false,
            'message' => 'organizaciòn no editado'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        dd($request->all());
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            DB::beginTransaction();
            $organization = Organization::find($id);
            $organization->delete();
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Organizaciòn eliminado correctamente'
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
