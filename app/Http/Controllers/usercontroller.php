<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class usercontroller extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Update other fields as needed

        $user->save();

        return redirect()->route('edit.profile')->with('success', 'Profile updated successfully.');
    }
}
