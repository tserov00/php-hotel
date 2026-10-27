<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', ['users' => User::all()]);
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
        return view('users.show', ['user' => User::findOrFail($id)]);
    }

    public function edit(string $id)
    {
        return view('users.edit', ['user' => User::findOrFail($id)]);
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
