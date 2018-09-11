<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use App\Models\Order;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'users';
    protected $fillable = [
        'name', 'email','password','phone','address',
        'gender','birthday','level','remember_token','created_at','updated_at',
    ];

}
