<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('admin.roles.index', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::all()->groupBy('module');
        return view('admin.roles.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $role = new Role();
            $role->name = $request->name;
            $role->description = $request->description;
            $role->guard_name = 'web';
            $role->save();
            $role->syncPermissions($request->get('permissions'));

            DB::commit();
            return redirect()->route('roles.index');
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
        //
    }


    public function edit($id)
    {
        $permissions = Permission::all()->groupBy('module');
        $role = Role::findById($id);
        return view('admin.roles.edit', compact('permissions', 'role'));
    }


    public function update(Request $request, $id)
    {
        $role = Role::findById($id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->guard_name = 'web';
        $role->save();
        // revocamos todos los permisos otorgados
        $role->revokePermissionTo(Permission::all());
        // sincronizar los nuevos permisos
        $role->syncPermissions($request->get('permissions'));

        return redirect()->route('roles.index');

    }


    public function destroy($id)
    {
        //
    }
}
