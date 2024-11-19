<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'deadline',
        'user_id',
        'project_id',
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
