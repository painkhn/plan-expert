<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\{Invite, Project};
use Auth;

class isProjectMember
{
    /*
    * Миддлвар проверки на участница проекта
    */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::user()) {
            abort(404);
        } else {
            $ProjectId = $request->route('id');

            if (!$this->isUserMemberOfProject($ProjectId, $user = Auth::id())) {
                abort(404);
            }
            return $next($request);
        }
    }

    private function isUserMemberOfProject($ProjectId, $user): bool
    {
        $invite = Invite::where('user_id', $user)->where('project_id', $ProjectId)->where('status', 'accepted')->first();
        $created = Project::where('id', $ProjectId)->where('user_id', $user)->first();
        if ($invite or $created) {
            return true;
        } else {
            return false;
        }
    }
}
