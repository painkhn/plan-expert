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
        // Изменить, в заваисимости от завершенности задач
        return view('panel', [
            'completed' => null,
            'unfinished' => Project::where('user_id', Auth::id())->get()
        ]);
    }
}
