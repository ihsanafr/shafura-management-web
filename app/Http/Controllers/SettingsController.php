<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAuthId = Auth::id();
        
        $users = User::findOrFail($getAuthId);

        return view('pages.settings.index', compact('users'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        };

        $user->update($data);

        return redirect('settings');
    }
}
