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

        return view('admin.users.index', compact('users', 'roles', 'permissions'));

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
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $password = $request->password;
            $data['password'] = bcrypt($password);
            $user = new User();
            $data['avatar'] = $this->loadFile($request, 'image', 'users', 'users');

            $user->fill($data);
            $user->save();

            $user->roles()->sync($request->get('roles'));

            DB::commit();
            return redirect()->route('users.index')->with('status', '¡Usuario registrado con exíto!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('error', '¡Error al registrar el usuario! ');

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
        return view('admin.users.edit', compact('roles', 'user'));
    }


    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $user = User::find($id);
            if ($request->file('image')) {
                $data['avatar'] = $this->loadFile($request, 'image', 'users', 'users');
            }
            $user->fill($data);
            $user->save();

            //$user->removeRole(Role::all());
            //$user->roles()->sync($request->get('roles'));
            DB::commit();
            return redirect()->route('users.index')->with('status', '¡Usuario modificado con exíto!');


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
