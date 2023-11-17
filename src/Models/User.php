<?php
namespace Yamama\Looom\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'admin';

    protected $fillable = [
        'username',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
    ];

}