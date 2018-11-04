<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Item extends Model
{
    protected $fillable = [
        'id',
        'name',
        'tax',
        'price'
    ];

    protected $casts = [
        'tax'   => 'integer'
    ];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();

        self::created(function ($item) {
            //If id is not passed, we will create a unique one
            if(!$item->id){

                $item->id = (string) Uuid::generate(4);

            }

        });
    }


}
