<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index() {
        $users = User::latest()->paginate(5);

        return view('admin-panel.user.index', compact('users'));
    }

    // to Users edit page
    public function edit($id) {
        $user = User::find($id);

        return view('admin-panel.user.edit', compact('user'));
    }

    // to update users
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'status' => 'required',
        ]);

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ]);

        return redirect()->route('users.index')->with('successMsg', 'You have successfully updated');
    }

    // to delete users
    public function delete($id) {
        User::find($id)->delete();

        return back()->with('successMsg', 'You have successfully deleted');
    }
}
