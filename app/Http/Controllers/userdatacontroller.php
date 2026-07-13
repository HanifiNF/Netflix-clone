<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserDataController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $users = User::when($query, function ($q) use ($query){
            $q->where('name', 'like', "%{$query}%");
        })
        ->orderBy('created_at', 'desc')
        ->take(6)
        ->get();

        return view('userdata', ['users' => $users, 'search' => $query]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('useredit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'admin' => 'required|integer',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->admin = $request->input('admin');

        $user->save();

        return redirect()->route('user.edit', $user->id)->with('success', 'User updated successfully.');
    }
}