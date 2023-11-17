<?php
namespace Yamama\Looom\Models;

use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    protected $primaryKey= 'iD';

    protected $table = 'shipping';

    protected $fillable = [
        'country_name',
        'country_code',
        'min_weight',
        'max_weight',
        'price',
        'additional_price',

    ];

    public $timestamps = false;

}