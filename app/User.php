<?php

namespace Birch;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    const FIELDS = [
        'username' => [
            'title' => 'Username',
            'validation' => 'required|max:50|min:2',//|unique:users,username',
            'editable' => false,
        ],
        'name' => [
            'title' => 'Name',
            'validation' => 'required|max:50|min:2',
            'editable' => true,
        ],
        'email' => [
            'title'  => 'Email',
            'validation' => 'required|max:50|min:2',
            'editable' => true,
        ],
    ];
}
