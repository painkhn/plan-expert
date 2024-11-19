<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = [
        'user_id',
        'project_id',
        'status',
    ];

        // Связь с моделью User
        public function user()
        {
            return $this->belongsTo(User::class);
        }

        // Связь с моделью Project
        public function project()
        {
            return $this->belongsTo(Project::class);
        }
}
