<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if the current password matches the one stored in the database
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error','Current password is incorrect' );
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success','Password changed successfully' );
    }

    public function createUpdateProfile(CreateProfileRequest $request, $id = null)
    {
        try {
            if (auth()->user()->profile()) {
                $profile = Profile::findOrFail(auth()->user()->id);
                $profile->update($request->validated());
            } else {
                $profile = Profile::create($request->validated());
            }

            return redirect()->back()->with('success', 'Profile saved successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage() . ' file: ' . $e->getFile() . ' line: ' . $e->getLine());
            return redirect()->back()->with('error', 'Error processing the request'.$e->getMessage());
        }
    }

}
