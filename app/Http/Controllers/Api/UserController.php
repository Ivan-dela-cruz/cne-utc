<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
            return redirect()->route('users.index')->with('status', 'error');
        }
    }


    public function show()
    {
        $user =User::find(auth()->user()->id);
       
        return view('admin.users.profile',compact('user'));
    }

    public function updateProfile(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $user =User::find(auth()->user()->id);
            
            if ($request->file('image')) {
                $data['avatar'] = $this->loadFile($request, 'image', 'users', 'users');
            }
            $user->fill($data);
            $user->save();
            DB::commit();
            return redirect()->route('users.index')->with('status', '¡Perfil modificado con exíto!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('status', 'error');
        }
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
            $user->roles()->detach();
            $user->roles()->sync($request->get('roles'));
            DB::commit();
            return redirect()->route('users.index')->with('status', '¡Usuario modificado con exíto!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('status', 'error');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $user = User::find($id);
            $user->roles()->detach();
            $user->delete();
            DB::commit();
            return redirect()->route('users.index')->with('status', '¡Usuario eliminado con exíto!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('status', 'error');
        }
    }

    public function changeStatus($id)
    {
        $user = User::find($id);
        if($user->status==1){
           
            $user->status = 0;
        }else{
           
            $user->status = 1;
        }
        $user->save();

        return response()->json([
            'status'=>true,
            'user'=>$user
        ],200);
        
    }

    public function changePassword()
    {
        return view('admin.users.password');
    }
    public function changePasswordPost(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ],[
            'current_password.required' => "La contaseña es aterior es obligatoria.",
            'new_password.required' => "La contaseña nueva es obligatoria.",
            'new_confirm_password.same' => "La nueva contraseña de confirmación y la nueva contraseña deben coincidir.",
        ]);
        try {
            DB::beginTransaction();
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            DB::commit();
            return redirect()->route('users.index')->with('status', 'Contraseña cambiado con exíto!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('status', 'error');
        }

        

        
    }
}
