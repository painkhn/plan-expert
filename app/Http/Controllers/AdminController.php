<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{

    /*
    * Открытие админки
    */
    public function index($user = null) {
        if ($user == null) {
            $user = User::all();
        }
        return view('admin.index', [
            'users' => $user
        ]);
    }

    /*
    * Поиск пользователя
    */
    public function search(Request $request) {
        $validate = $request->validate([
            'word' => 'required|string',
        ]);

        return $this->index(User::where('name', 'like', '%' . $request->word . '%')->get());
        // return view('admin.index', [
        //     'users' => User::where('name', 'like', '%' . $request->word . '%')->get()
        // ]);
    }

    /*
    * Блокировка пользователя
    */
    public function banUser($id)
    {
        $user = User::findOrFail($id);
        $user->isBan = $user->isBan == 0 ? 1 : 0;
        $user->save();

        return redirect(route('admin.index'))->with('flash_message', [
            'status' => 'Успешно!',
            'message' => 'Изменения сохранены'
        ]);
    }
}
