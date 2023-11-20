<?php

namespace Yamama\Looom\Controllers;

use Yamama\Looom\Models\Cart;

class   UserController
{

    public static function all(){
        Cart ::create([
            "id_product_card" => 8,
            "member_id" => 5,
        ]);
        return Cart::all();
    }
}