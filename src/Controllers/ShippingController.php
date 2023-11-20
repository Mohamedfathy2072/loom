<?php

namespace Yamama\Looom\Controllers;

use Yamama\Looom\Models\shipping;

class ShippingController
{

    public static function all(){

        shipping ::create([
            "country_name" => 'qatar',
            "country_code" => 'qatsar',
            "min_weight" => '1',
            "max_weight" => '15',
            "price" => '225',
            "additional_price" => '5',
        ]);

        return shipping::all();
    }
}