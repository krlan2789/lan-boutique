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
        $redirectUrl = '/login';
        $statusMessage = 'Registration successfull!! Please login';

        $validated = $request->validate([
            'name' => 'required|min:1|max:255',
            // 'username' => 'required|min:6|max:64|unique:users',
            'email' => 'required|email:dns|unique:users,username',
            'password' => 'required|min:8|max:64',
            'verifyPassword' => 'required|min:8|max:64',
            'isMale' => 'nullable'
        ]);

        if ($validated['password'] != $validated['verifyPassword']) {
            return redirect($redirectUrl);
        }

        $validated['username'] = $validated['email'];
        $validated['password'] = Hash::make($validated['password']);
        $validated['role_id'] = Role::first()->id;

        if (!isset($validated['isMale']) || $validated['isMale'] != true) $validated['isMale'] = false;
        else $validated['isMale'] = true;

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
