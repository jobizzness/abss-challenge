<?php


namespace App;


class Line
{
    public $id;
    protected $quantity = 1;
    protected $discount = 0;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = ($quantity > 0) ? $quantity : 1;
    }

    /**
     * @return int
     */
    public function getDiscount(): int
    {
        return $this->discount;
    }

    /**
     * must be > 0% and not > 50% of price
     * @param int $discount
     */
    public function setDiscount(int $discount): void
    {
        $this->discount = ($discount > 0 && $discount <= 50) ? $discount : 0;

    }

    public function getPrice()
    {
        $item = Item::findOrFail($this->id);

        return $item->price;
    }


}