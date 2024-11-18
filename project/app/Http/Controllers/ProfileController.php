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

        $projects = Project::where('user_id', Auth::id())->get();

        $unfinishedProjectsCount = $projects->filter(function ($project) {
            return $project->tasks()->where('status', 'not_done')->exists();
        })->count();

        $finishedProjectsCount = $projects->filter(function ($project) {
            return $project->tasks()->where('status', 'not_done')->doesntExist();
        })->count();

        return view('profile', [
            'count_projects' => $projects->count(),
            'participant' => $finduser,
            'projects' => $projects,
            'invite' => Invite::with('user', 'project')->where('user_id', Auth::id())->where('status', 'awaits')->get(),
            'unfinished_projects_count' => $unfinishedProjectsCount,
            'finished_projects_count' => $finishedProjectsCount,
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

        if ($request->user()->save()) {
            return Redirect::route('profile.edit')->with('flash_message', [
                'status' => 'success',
                'message' => 'Профиль успешно обновлен'
            ]);
        } else {
            return Redirect::route('profile.edit')->with('flash_message', [
                'status' => 'error',
                'message' => 'Произошла ошибка при обновлении профиля'
            ]);
        }
    }
}
