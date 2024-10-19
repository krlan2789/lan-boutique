<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('components.auth', [
            'title' => 'Login'
        ]);
    }

    public function showRegister()
    {
        return view('components.auth', [
            'title' => 'Registration'
        ]);
    }

    public function login()
    {
        return view('components.auth', [
            'title' => 'Login'
        ]);
    }

    public function register(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|min:1|max:255',
            // 'username' => 'required|min:6|max:64|unique:users',
            'email' => 'required|email:dns|unique:users,username',
            'password' => 'required|min:8|max:64',
            'isMale' => 'nullable'
        ]);

        $validated['username'] = $validated['email'];
        $validated['password'] = Hash::make($validated['password']);
        $validated['role_id'] = Role::first()->id;

        if (!isset($validated['isMale']) || $validated['isMale'] != true) $validated['isMale'] = false;
        else $validated['isMale'] = true;

        $redirectUrl = '/login';
        $statusMessage = 'Registration successfull!! Please login';
        try {
            User::create($validated);
        } catch (Exception $e) {
            $statusMessage = $e->getMessage();
            $redirectUrl = '/register';
        }

        $request->session()->flash('status');
        $request->session()->flash('status.title', 'Account Registration');
        $request->session()->flash('status.message', $statusMessage);

        return redirect($redirectUrl);
    }
}
