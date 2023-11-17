<?php
namespace Yamama\Looom\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $primaryKey= 'iD';

    protected $table = 'commission';

    protected $fillable = [
        'number',

    ];

    public $timestamps = false;

}