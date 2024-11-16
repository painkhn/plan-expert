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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
