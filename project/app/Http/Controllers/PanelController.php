<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Project;

class PanelController extends Controller
{
    /*
    * Отображение страницы Панель задач
    */
    public function index() {
        $userId = Auth::id();

        $createdProjects = Project::with('tasks')
            ->where('user_id', $userId)
            ->get();

        $invitedProjects = Project::with('tasks')
            ->join('invites', 'projects.id', '=', 'invites.project_id')
            ->where('invites.user_id', $userId)
            ->where('invites.status', 'accepted')
            ->select('projects.*')
            ->get();

        $projects = $createdProjects->merge($invitedProjects);

        $groupedProjects = $projects->groupBy(function ($project) {
            return $project->tasks->where('status', 'not_done')->count() > 0 ? 'unfinished' : 'completed';
        });

        $finishedProjectsCount = $groupedProjects->get('completed', collect())->count();
        $unfinishedProjectsCount = $groupedProjects->get('unfinished', collect())->count();

        $totalProjectsCount = $projects->count();

        return view('panel', [
            'totalProjectsCount' => $totalProjectsCount,
            'finishedProjectsCount' => $finishedProjectsCount,
            'unfinishedProjectsCount' => $unfinishedProjectsCount,
            'completed' => $groupedProjects->get('completed', collect()),
            'unfinished' => $groupedProjects->get('unfinished', collect()),
        ]);
    }

    /*
    * Поиск проекта на панели задач
    */
    public function search(Request $request) {
        $searchWord = $request->input('word');
        $projects = Project::where('name', 'like', '%' . $searchWord . '%')->get();
        $groupedProjects = $projects->groupBy(function ($project) {
            return $project->tasks->where('status', 'not_done')->count() > 0 ? 'unfinished' : 'completed';
        });

        $finishedProjectsCount = $groupedProjects->get('completed', collect())->count();
        $unfinishedProjectsCount = $groupedProjects->get('unfinished', collect())->count();

        $totalProjectsCount = $projects->count();

        return view('panel', [
            'totalProjectsCount' => $totalProjectsCount,
            'finishedProjectsCount' => $finishedProjectsCount,
            'unfinishedProjectsCount' => $unfinishedProjectsCount,
            'completed' => $groupedProjects->get('completed', collect()),
            'unfinished' => $groupedProjects->get('unfinished', collect()),
        ]);
    }
}
