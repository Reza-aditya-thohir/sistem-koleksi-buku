<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function editProfile()
    {
        $user = Auth::user();
        return view('dashboard.profile.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|string|in:L,P',
            'profile_images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $profile = $user->profile ?? new Profile(['user_id' => $user->id]);
        $profile->no_hp = $request->no_hp;
        $profile->alamat = $request->alamat;
        $profile->tanggal_lahir = $request->tanggal_lahir;
        $profile->jenis_kelamin = $request->jenis_kelamin;

        if ($request->hasFile('profile_images')) {
            if ($profile->profile_images) {
                Storage::disk('public')->delete($profile->profile_images);
            }
            $profile->profile_images = $request->file('profile_images')->store('profile_images', 'public');
        }

        $profile->save();

        return redirect()->route('profile.edit_profile')->with('success', 'Profile updated successfully.');
    }
}
