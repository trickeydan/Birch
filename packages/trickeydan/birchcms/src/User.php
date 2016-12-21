<?php

namespace Trickeydan\Birchcms;

use Trickeydan\Birchcms\Notifications\NewUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Support\Facades\Password;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password','group_id'
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
        'group' => [
            'title' => 'Group',
            'validation' => '',
            'editable' => false,
            'autofill' => 'Default',
        ]
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function group(){
        return $this->belongsTo('Trickeydan\Birchcms\Group');
    }

    public static function newUser($username, $name,$email,$password = null){
        if($password == null){
            $password = str_random();
        }
        $u =  User::create([
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'group_id' => Group::whereSlug('default')->first()->id,
        ]);
        $u->notify(new NewUser($password));
        return $u;
    }


    public function hasPermission($permission){
        if($this->group->hasPermission($permission)){
            Debugbar::info($permission);
        }
        return $this->group->hasPermission($permission);
    }

    public function sendResetLink(){
        Password::broker()->sendResetLink(['email' => $this->getEmailForPasswordReset()]);
    }
}
