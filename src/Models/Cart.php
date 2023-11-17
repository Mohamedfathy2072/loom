<?php
namespace Yamama\Looom\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey= 'iD';

    protected $table = 'cart';

    protected $fillable = [
        'id_product_card',
        'member_id',
    ];

    public $timestamps = false;

}