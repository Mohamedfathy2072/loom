<?php
namespace Yamama\Looom\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $primaryKey= 'iD';

    protected $table = 'category';

    protected $fillable = [
        'title',
        'image_type',
        'image_file',

    ];

    public $timestamps = false;

}