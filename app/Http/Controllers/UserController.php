<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = User::create($request->only(['name', 'email', 'password', 'phone']));
        return response()->json($user, 201);
    }

    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    public function edit(User $user)
    {
        return view('users.edit');
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email', 'password', 'phone']));
        return response()->json($user, 200);
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json($user, 200);
    }
}
