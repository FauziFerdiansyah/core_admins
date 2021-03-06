<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'status', 'created_by', 'updated_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:140|unique:users,email',
        'username' => 'required|valid_username|max:100|unique:users,username',
        'password' => 'required|min:6|confirmed',
    ];
    
    public static function rule_edit($id)
    {
        return array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:140|unique:users,email,'.$id,
            'username' => 'required|valid_username|max:100|unique:users,username,'.$id
        );
    }

}
