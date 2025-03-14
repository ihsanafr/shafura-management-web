<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' =>'required | string ',
            'email' =>'required | email ',
            'password' =>'required |  ',
        ]);
        $data = [
            'name'=> $validate['name'],
            'email'=> $validate['email'],
            'password'=> Hash::make($validate['name'],)
        ];

        User::create($data);

        return redirect('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.users.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable',
        ]);
        $data =[
            'name'=> $request->name,
            'email'=> $request->email,
        ];
        if($request->filled('password')){
Hash::make($request->password);
        };

        User::update($data);

        return redirect('users');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('users');
    }
}
