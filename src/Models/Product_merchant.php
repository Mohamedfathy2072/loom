<?php
namespace Yamama\Looom\Models;

use Illuminate\Database\Eloquent\Model;

class Product_merchant extends Model
{
    protected $primaryKey= 'iD';

    protected $table = 'product_merchant';

    protected $fillable = [
        'title',
        'price',
        'Weight',
        'category',
        'size_title',
        'size',
        'description',
        'description_api',
        'img_type',
        'img_file',
        'price_coupon',
        'quantity',
        'rt_product',
        'grenti',
        'generate_code',
        'id_user',

    ];

    public $timestamps = false;

}