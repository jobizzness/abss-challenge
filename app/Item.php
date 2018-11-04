<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $casts = [
      'price'    => 'decimal:2'
    ];

    protected $fillable = [
        'name',
        'tax',
        'price'
    ];

    /**
     * Default tax is 6%
     * @var int
     */
    protected $defaultTax = 6;

    /**
     * @param $tax
     */
    public function setTaxAttribute($tax)
    {
        if($tax < $this->defaultTax) throw new \InvalidArgumentException();

        $this->attributes['tax_value']  = $tax;
    }

    /**
     * @return int
     */
    public function getTaxAttribute()
    {
        return $this->attributes['tax_value'] ?: $this->defaultTax;
    }

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($item) {
            $item->id = (string) Uuid::generate(4);
        });
    }


}
