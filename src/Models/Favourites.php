<?php
namespace Yamama\Looom\Models;

use Illuminate\Database\Eloquent\Model;

class Favourites extends Model
{
    protected $primaryKey= 'iD';

    protected $table = 'favourites';

    protected $fillable = [
        'product_id_fv',
        'member_id',
    ];

    public $timestamps = false;

}