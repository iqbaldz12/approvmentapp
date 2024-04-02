<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname'       => 'required|string',
            'username'       => 'required|string',
            'password'        => 'required|string',
            'role'           => 'required|string'
        ]);



        //create tasks
        User::create([
            'fullname'    => $request->fullname,
            'username'    => $request->username,
            'password'    => $request->password,
            'role'        => $request->role,
        ]);

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'fullname'       => 'required|string',
            'username'       => 'required|string',
            'role'           => 'required|string'
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('fullname')) {
            $user->update([
                'fullname'    => $request->fullname,
                'username'    => $request->username,
                'role'        => $request->role
            ]);
        } else {

            $user->update([
                'fullname'    => $request->fullname,
                'username'    => $request->username,
                'role'        => $request->role,
            ]);
        }

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        //delete post
        $user->delete();

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

