<?php

namespace Yamama\Looom\Controllers;

use Yamama\Looom\Models\Cart;
use Yamama\Looom\Models\User;

class UserController
{

    public static function all(){
//        (`iD`, ``, ``) VALUES (NULL, '6', '5');
        Cart ::create([
            "id_product_card" => 8,
            "member_id" => 5,
        ]);
        return Cart::all();
    }
}