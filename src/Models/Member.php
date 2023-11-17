<?php
namespace Yamama\Looom\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey= 'iD';

    protected $table = 'member';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'gender',
        'lang',

        'password',
        'code',
        'status',


    ];
    protected $hidden = [
        'password',
    ];


    public $timestamps = false;

}