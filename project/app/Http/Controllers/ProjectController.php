<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        return view('project.new');
    }

    public function show($id) {
        return view('project.index', [
            'project' => Project::findOrFail($id)
        ]);
    }

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

        return redirect()->back();
    }

}
