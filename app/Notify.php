<?php

namespace Teek;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $fillable = [
        'user_id', 'action', 'message', 'read', 'for',
    ];

    public function user()
    {
        return $this->belongsTo('Teek\User');
    }
}
