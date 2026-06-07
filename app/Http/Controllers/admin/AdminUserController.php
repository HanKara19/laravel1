<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $users = User::all();

    return view('admin.users.index', compact('users'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
{
    return view('admin.users.show', compact('user'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
{
    $user->name = $request->name;
    $user->email = $request->email;
    $user->role = $request->role;

    if ($request->hasFile('image')) {
        $user->image = $request->file('image')->store('users', 'public');
    }

    $user->save();

    return redirect(route('admin.users.index'))
        ->with('success', 'User updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
{
    $user->delete();

    return redirect(route('admin.users.index'))
        ->with('success', 'User deleted successfully.');
}
}
