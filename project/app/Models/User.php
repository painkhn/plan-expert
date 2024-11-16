<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // Связь с моделью Project
    public function projects()
    {
        return $this->hasMany(Project::class);
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
