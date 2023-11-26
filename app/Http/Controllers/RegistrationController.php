<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class RegistrationController extends Controller
{
    public function index()
    {
        return view('layout.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:40',
            'email' => 'required', 
            'password' => 'required|min:6|max:30',
        ]);

        User::create($request->all());

        return redirect()->route('main')->with('success','Registration was successfully.');
    }
}
