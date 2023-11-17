<?php
namespace Yamama\Looom\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey= 'iD';

    protected $table = 'contact';

    protected $fillable = [
        'full_name',
        'email',
        'subject',
        'msg',
        'email',

    ];

    public $timestamps = false;

}