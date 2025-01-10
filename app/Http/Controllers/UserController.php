<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('dashboard.user', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|string|min:6', // Make password nullable
            'role' => 'required|string',
        ]);


        $plainPassword = $validated['password'] ?? Str::random(8);

        $validated['password'] = Hash::make($plainPassword);

        $user = User::create($validated);

        return response()->json([
            'user' => $user,
            'plain_password' => $plainPassword,
            'message' => 'Your password is ' . $plainPassword, // Including plain password before hashing
        ], 201);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $userName = $user->name;


        $user->delete();

        return response()->json(['message' => "User ${userName} deleted successfully"], 200);
    }





    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.user-update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:6',
            'role' => 'sometimes|string',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return response()->json($user);
    }


}

