<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        //$data = $request->all();
        //dd($data);
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:25|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        // var_dump($validateData);
        // die;
        //$validateData['password'] = bcrypt($validateData['password']);
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        //$request->session()->flash('success', 'Registration sucessfull! Please login');
        return redirect('/login')->with('success', 'Registration sucessfull! Please login');
        // Category::create([
        //     'name' => 'Web Programming',
        //     'slug' => 'web-programming'
        // ]);
        // dd('registrtasi berhasil');
    }
}
