<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\{Task, Project};

class TaskController extends Controller
{
    /*
    * Добавление задачи
    */
    public function upload(Request $request) {
        $validate = $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'user_id' => 'required|integer|min:1',
            'project_id' => 'required|integer|min:1'
        ]);

        $date = Carbon::createFromFormat('m/d/Y', $request->input('date'))->format('Y-m-d');

        Task::create([
            'name' => $request->name,
            'deadline' => $date,
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,
        ]);

        return redirect()->back()->with('flash_message', [
            'status' => 'Успешно!',
            'message' => 'Задача создана'
        ]);;
    }

    /*
    * Обновление задачи
    */
    public function update($id, Request $request) {
        $validate = $request->validate([
            'name' => 'required|string',
        ]);

        $task = Task::findOrFail($id);
        $project = Project::findOrFail($task->project_id);

        $task->update([
            'name' => $request->name
        ]);

        return redirect(route('project.show', [$project->id]))->with('flash_message', [
            'status' => 'Успешно!',
            'message' => 'Задача была отпредактирована'
        ]);;
    }

    /*
    * Удаление задачи
    */
    public function delete($id) {
        $task = Task::findOrFail($id);
        $project = Project::findOrFail($task->project_id);

        $task->delete();

        return redirect(route('project.show', [$project->id]))->with('flash_message', [
            'status' => 'Успешно!',
            'message' => 'Задача была удалена'
        ]);;
    }

    /*
    * Обновление статуса задачи
    */
    public function status($id) {
        $task = Task::findOrFail($id);

        if ($task) {
            $task->status = $task->status === 'done' ? 'not_done' : 'done';
            $task->save();
        }

        return redirect()->back()->with('flash_message', [
            'status' => 'Успешно!',
            'message' => 'Статус задачи обновлен'
        ]);;
    }
}
