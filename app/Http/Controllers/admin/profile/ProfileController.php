<?php

namespace App\Http\Controllers\admin\profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('admin.profile.profile', compact('users'));
    }
    /**
     * Add Admin Information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addAdmin(Request $request)
    {
        $Messages = [
            'adminName.required' => 'Admin Name is required',
            'adminPass.required' => 'Password is required',
            'adminEmail.required' => 'Password is required',
            'adminEmail.unique' => 'Admin with this email allready exist!',
        ];

        $validatedData = $request->validate([
            'adminName' => 'required',
            'adminEmail' => 'required|unique:users,email',
            'adminPass' => 'required',
        ],$Messages);

        $user = new User;
        $user->name = request('adminName');
        $user->email = request('adminEmail');
        $user->password = Hash::make(request('adminPass'));

        if ($user->save()) {
            return redirect()->route('profile',session()->getId())->with('success', 'New Amdin information has been added');
        }
    }
    /**
     * Update Admin Information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $Messages = [
            'adminName.required' => 'Admin Name is required',
        ];

        $validatedData = $request->validate([
            'adminName' => 'required',
            'adminPass' => 'nullable',
        ],$Messages);

        $user=User::find(request('adminId'));
        $user->update([
            'name' => request('adminName'),
            'password' => Hash::make(request('adminPass')),
        ]);
        if ($user) {
            return redirect()->route('profile',session()->getId())->with('success', 'Admin information has been Updated');
        } 
    }

    /**
     * Remove Admin information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remove(Request $request)
    {
        $user=User::find(request('adminId'));
        if ($user->delete()) {
            $users = User::orderBy('id', 'asc')->get();
            return view('admin.profile.ajaxProfileTable',compact('users'))->with('success','Admin has been removed');
        }
    }
}
