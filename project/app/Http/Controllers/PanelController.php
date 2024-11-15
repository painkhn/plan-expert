<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    /*
    * Отображение страницы Панель задач
    */
    public function index() {
        return view('panel');
    }
}
