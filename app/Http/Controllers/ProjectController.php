<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Models\{Project, Invite};
use App\Exports\ProjectReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ProjectController extends Controller
{
    /*
    * Открытие страницы создания проекта
    */
    public function index() {
        return view('project.new');
    }

    /*
    * Страница открытия проекта
    */
    public function show($id) {
        $project = Project::with(['tasks' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);
        $finishedTasksCount = $project->tasks->where('status', 'done')->count();
        $unfinishedTasksCount = $project->tasks->where('status', 'not_done')->count();

        return view('project.index', [
            'project' => $project,
            'users' => Invite::with('user')->where('project_id', $project->id)->where('status', 'accepted')->get(),
            'finished_tasks_count' => $finishedTasksCount,
            'unfinished_tasks_count' => $unfinishedTasksCount,
        ]);
    }

    /*
    * Добавление проекта
    */
    public function upload(Request $request) {
        $validate = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'start' => 'required|date|before:end',
            'end' => 'required|date|after:start',
        ]);

        // Преобразование даты в правильный формат
        $startDate = Carbon::createFromFormat('m/d/Y', $request->input('start'))->format('Y-m-d');
        $endDate = Carbon::createFromFormat('m/d/Y', $request->input('end'))->format('Y-m-d');

        $user = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'start' => $startDate,
            'end' => $endDate,
            'user_id' => Auth::id()
        ]);

        return redirect(route('project.show', [$user->id]))->with('flash_message', [
            'status' => 'Успешно',
            'message' => 'Проект создан'
        ]);
    }

    /*
    * Скачивание отчета по проекту
    */
    public function exel($id) {
        return Excel::download(new ProjectReportExport($id), 'project_report.xlsx');
    }
}
