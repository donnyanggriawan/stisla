<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.profile', [
            'title' => 'Profile'
        ]);
    }

    public function updateProfile(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['string', 'min:3', 'max:191', 'required',],
            'email' => ['required', 'email', 'unique:users,email,' . auth()->id()]
        ]);

        auth()->user()->update($validateData);

        return redirect('/profile')->with('success', 'Profile has been updated!');
    }

    public function passwordView()
    {
        return view('profile.password', [
            'title' => 'Change Password'
        ]);
    }

    public function changePassword(Request $request)
    {
        $validateData = $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        if(Hash::check($request->current_password, Auth::user()->password)){
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return back()->with("success", "ur password has been updated");
        }

        throw ValidationException::withMessages([
            'current_password' => 'Your Password does not match with our record',
        ]);
    }
}
