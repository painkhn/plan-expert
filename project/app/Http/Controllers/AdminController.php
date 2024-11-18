<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index', [
            'users' => User::all()
        ]);
    }

    public function search(Request $request) {
        $validate = $request->validate([
            'word' => 'required|string',
        ]);

        return view('admin.index', [
            'users' => User::where('name', 'like', '%' . $request->word . '%')->get()
        ]);
    }

    public function banUser($id)
    {
        $user = User::findOrFail($id);
        $user->isBan = $user->isBan == 0 ? 1 : 0;
        $user->save();

        return redirect()->back()->with('flash_message', [
            'status' => 'Успешно!',
            'message' => 'Изменения сохранены'
        ]);
    }
}
