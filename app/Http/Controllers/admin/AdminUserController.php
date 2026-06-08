<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::with('roles')->latest()->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Preferences > Users linki de aynı kullanıcı listesini açsın.
     */
    public function preferences()
    {
        $users = User::with('roles')->latest()->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        $user->load('roles');

        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified user.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('role')) {
            $user->role = $request->role;
        }

        /*
         |--------------------------------------------------------------------------
         | User image update
         |--------------------------------------------------------------------------
         */
        if ($request->hasFile('image')) {
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            $user->image = $request->file('image')->store('users', 'public');
        }

        $user->save();

        if ($request->filled('role')) {
            $role = Role::where('name', $request->role)->first();

            if ($role) {
                $user->roles()->syncWithoutDetaching([$role->id]);
            }
        }

        return redirect(route('admin.users.index'))
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user.
     */
    public function destroy(User $user)
    {
        if ($user->image && Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }

        $user->roles()->detach();

        $user->delete();

        return redirect(route('admin.users.index'))
            ->with('success', 'User deleted successfully.');
    }
}