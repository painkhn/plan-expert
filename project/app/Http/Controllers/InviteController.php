<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invite;
use Auth;

class InviteController extends Controller
{
    public function upload(Request $request) {
        $validate = $request->validate([
            'project' => 'required|integer|min:1',
            'user_id' => 'required|integer|min:1',
        ]);
        $invite = Invite::where('project_id', $request->project)->where('user_id', $request->user_id)->orderBy('created_at', 'desc')->first();

        if ($invite && $invite->status != 'awaited') {
            return redirect()->back()->with('flash_message', [
                'status' => 'Внимание!',
                'message' => 'Приглашение уже отправлено'
            ]);
        } else {
            Invite::create([
                'project_id' => $request->project,
                'user_id' => $request->user_id,
                'status' => 'awaits'
            ]);
        }

        return redirect()->back()->with('flash_message', [
            'status' => 'Успешно!',
            'message' => ' Приглашение было отправлено'
        ]);
    }

    public function update($id, Request $request) {
        $invite = Invite::findOrFail($id);
        $status = $request->input('status');
        $invite->status = $status;
        $invite->save();
        if ($status == 'accepted'){
            return redirect(route('project.show', [$id]))->with('flash_message', [
                'status' => 'Успешно!',
                'message' => 'Приглашение принято'
            ]);
        } else {
            return redirect()->back()->with('flash_message', [
                'status' => 'Успешно!',
                'message' => 'Приглашение было отклонено'
            ]);
        }
    }
}
