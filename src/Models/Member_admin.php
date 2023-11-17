<?php
namespace Yamama\Looom\Models;

use Illuminate\Database\Eloquent\Model;

class Member_admin extends Model
{
    protected $table = 'member_admin';

    protected $fillable = [
        'username',
        'email',
        'password',
        'role_add',
        'role_edit',
        'role_delete',

    ];
    protected $hidden = [
        'password',
    ];

}