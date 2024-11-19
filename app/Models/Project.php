<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'description',
        'start',
        'end',
    ];

    // Связь с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Связь с моделью Task
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Связь с моделью Invite
    public function invites()
    {
        return $this->hasMany(Invite::class);
    }
}
