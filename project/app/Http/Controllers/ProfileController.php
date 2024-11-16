<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Project;
use App\Models\User;
use App\Models\Invite;

class ProfileController extends Controller
{

    public function search(Request $request) {
        $user = User::where('name', $request->name)->first();

        if ($user) {
            if ($user->id === Auth::id()) {
                return redirect()->route('profile.index');
            }
            return redirect()->route('profile.index', ['user' => $user->id]);
        } else {
            return redirect()->route('profile.index');
        }
    }

    public function index($user = null) {
        $finduser = null;
        if ($user) {
            $finduser = User::findOrFail($user);
        }
        return view('profile', [
            'count_projects' => Project::where('user_id', Auth::id())->count(),
            'participant' => $finduser,
            'projects' => Project::where('user_id', Auth::id())->get(),
            'invite' => Invite::with('user', 'project')->where('user_id', Auth::id())->where('status', 'awaits')->get()
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


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
}
