<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminUserController extends Controller
{
    public function showAssignAdminForm()
    {
        $users = User::all();
        return view('assign-admin', compact('users'));
    }

    public function assignAdminRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        if (auth()->user()->role === 'admin') {
            $user = User::find($request->user_id);
            $user->update(['role' => 'admin']);
            return redirect()->route('admin.dashboard')->with('success', 'Le rôle d\'administrateur a été attribué avec succès.');
        }

        return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à attribuer le rôle d\'administrateur.');
    }
}
