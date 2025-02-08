<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class StaffRepository implements StaffRepositoryInterface
{
    public function getAllStaff()
    {
        // Return paginated list of users
        $users = User::paginate(5);
        return view('frontend.staff', compact('users'));
    }

    public function registerStaff($request)
    {
        // Validate data directly in the controller or using a custom request class
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => ['required', 'in:admin,manager,assistant,user'],
        ]);

        // Create the staff user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'Staff member registered successfully!', compact('user'));
    }

    public function destroyStaff($id)
    {
        // Find and delete the user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Staff member deleted successfully!');
    }

    public function updateStaff($request)
    {
        // Validate request data
        $request->validate([
            'id' => 'required|exists:users,id',
            'role' => 'required|in:user,admin,manager,assistant',
        ]);

        // Find the user and update the role
        $user = User::findOrFail($request->id);
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'User role updated successfully.');
    }
}
