<?php
require __DIR__ . "/../../inc/config/db.php";

use Illuminate\Database\Capsule\Manager as Capsule;



if (!Capsule::schema()->hasTable('mahmoud')) {
    Capsule::schema()->create('mahmoud', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('userimage')->nullable();
        $table->string('api_key')->nullable()->unique();
        $table->rememberToken();
        $table->timestamps();
    });
}




?>