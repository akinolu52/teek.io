<?php

namespace Teek;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'role', 'avatar', 'provider', 'provider_id', 'bio'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function task()
    {
        return $this->hasMany('Teek\Task');
    }

    public function notify()
    {
        return $this->hasMany('Teek\Notify');
    }
}
