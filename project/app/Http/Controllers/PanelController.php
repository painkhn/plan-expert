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
        $projects = Project::with('tasks')->where('user_id', Auth::id())->get();

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

    public function sort(Request $request) {
        $sortBy = $request->input('sort_by');
        $projects = Project::with('tasks')->where('user_id', Auth::id());

        switch ($sortBy) {
            case 'name':
                $projects = $projects->orderBy('name');
                break;
            case 'created_at':
                $projects = $projects->orderBy('created_at');
                break;
            case 'task_count':
                $projects = $projects->withCount('tasks')->orderBy('tasks_count');
                break;
            case 'completed':
                $projects = $projects->whereHas('tasks', function ($query) {
                    $query->where('status', 'done');
                });
                break;
            case 'unfinished':
                $projects = $projects->whereHas('tasks', function ($query) {
                    $query->where('status', 'not_done');
                });
                break;
            default:
                break;
        }

        $projects = $projects->get();

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
