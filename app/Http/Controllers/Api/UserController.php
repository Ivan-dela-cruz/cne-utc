<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

  public function index()
  {
    $users = User::orderBy('name', 'ASC')->get();
    $roles = Role::all();
    $permissions = Permission::all();
    $breadcrumbs = [
      ['link' => "dashboard-analytics", 'name' => "Home"], ['link' => "dashboard-analytics", 'name' => "Pages"], ['name' => "User List"]
    ];
    return view('admin.users.index', compact('users', 'roles', 'permissions', 'breadcrumbs'));

  }

  public function userData()
  {
    $users = User::orderBy('name', 'ASC')->get();

    return response()->json([
      'users' => $users
    ], 200);
  }


  public function create()
  {
    $roles = Role::all();
    $permissions = Permission::all()->groupBy('module');

    return view('admin.users.create', compact('roles', 'permissions'));
  }

  public function store(Request $request)
  {
    try {
      DB::beginTransaction();
      $data = $request->all();
      $user = new User();
      $data['avatar'] = $this->loadFile($request,'avatar','users','users');

      $user->fill($data);
      $user->save();

      $user->roles()->sync($request->get('roles'));

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


  public function show($id)
  {
    $user = User::find($id);
    if (isset($user)) {
      return response()->json([
        'status' => true,
        'user' => $user
      ], 200);
    }
    return response()->json([
      'status' => false,
      'message' => 'Usuario no entrado'
    ], 404);
  }


  public function edit($id)
  {
    $user = User::find($id);
    $roles = Role::all();
    $permissions = Permission::all();
    if (isset($user)) {
      return response()->json([
        'status' => true,
        'user' => $user,
        'roles' => $roles,
        'permissions' => $permissions
      ], 200);
    }
    return response()->json([
      'status' => false,
      'message' => 'Usuario no entrado'
    ], 404);
  }


  public function update(Request $request, $id)
  {
    try {
      DB::beginTransaction();
      $data = $request->all();
      $user = User::find($id);
      $user->fill($data);
      $user->save();
      DB::commit();
      return response()->json([
        'status' => true,
        'message' => 'Usuario modificado correctamente'
      ], 200);

    } catch (\Exception $e) {
      DB::rollBack();
      return response()->json([
        'status' => false,
        'message' => $e->getMessage()
      ], 500);
    }
  }

  public function destroy($id)
  {
    //
    try {
      DB::beginTransaction();
      $user = User::find($id);
      $user->delete();
      DB::commit();
      return response()->json([
        'status' => true,
        'message' => 'Usuario elemindado correctamente'
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
