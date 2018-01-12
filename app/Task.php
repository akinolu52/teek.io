<?php

namespace Teek;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'id', 'user_id', 'title', 'description', 'end_date', 'status', 'pa_id', 'done', 'created_at'
    ];

    public function user()
    {
        return $this->belongsTo('Teek\User');
    }
}
