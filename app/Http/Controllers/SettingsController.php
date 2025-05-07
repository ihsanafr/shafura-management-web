<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class SettingsController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('pages.settings.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('pages.settings.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,' . Auth::id()],
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        Auth::user()->update($validatedData);

        return redirect('settings')->with('success', 'Profile updated successfully.');
    }
}
