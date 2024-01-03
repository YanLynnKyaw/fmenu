<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Arr;

class AuthController extends Controller
{

    public function index()
    {
        $users = User::all(); // Assuming you have a User model
        return view('Users', compact('users'));
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        }
        return redirect()->route('users.index')->with('error', 'User not found');
    }

    public function register()
    {
        return view ('Register');
    }
    public function registerPost(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        $role = Role::where('name', 'guest')->first();
        $user->assignRole($role);

        return back()->with('success', 'Register Successful');
    }
    public function login()
    {
        return view('Login');
    }

    public function loginPost(Request $request)
    {
        $credetials =[
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credetials)){
            return redirect('School')->with('success', 'Login Successful');
        }

        return back()->with('error','login fail');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
    public function create()
    {
        return view('create-user');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $role = Role::where('name', 'guest')->first();
        $user->assignRole($role);


        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function updateRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $request->validate([
            'role' => 'required|in:admin,editor',
        ]);

        // Remove existing roles (optional, depending on your application logic)
        $user->syncRoles([]);

        // Assign the selected role
        $role = Role::where('name', $request->input('role'))->first();
        $user->assignRole($role);

        return redirect()->route('users.index')->with('success', 'User role updated successfully');
    }

}