<?php
namespace Yamama\Looom\Models;

use Illuminate\Database\Eloquent\Model;

class Img_product_merchant extends Model
{
    protected $primaryKey= 'iD';

    protected $table = 'img_product_merchant';

    protected $fillable = [
        'file_type',
        'file_src',
        'product_id',

    ];

    public $timestamps = false;

}