<?php

namespace App\Console\Commands;

use App\Item;
use Illuminate\Console\Command;

class InvoiceCalculation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    private $items;

    /**
     * Create a new command instance.
     *
     * @param $items
     */
    public function __construct($items)
    {
        parent::__construct();
        $this->items = collect($items);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $calculatedLines = $this->items->transform(function($line){

            $item = Item::findOrFail($line->id);

           return [
               'name'           => $item->name,
               'quantity'       => $line->getQuantity(),
               'discount'       => $line->getDiscount(),
               'tax_rate'       => $item->tax,
               'total'          => $this->getLineTotal($item->price, $line->getDiscount()),
               'tax_due'        => $this->getLineTax($item->tax, $item->price)
           ];
        });

        return [
            'lines'         => $calculatedLines,
            'total'         => $this->getInvoiceTotal($calculatedLines),
            'tax'           => $this->getInvoiceTax($calculatedLines)
        ];
    }

    /**
     * @param int $price
     * @param int $discount
     * @return float|int
     */
    private function getLineTotal($price = 0, $discount = 0)
    {
        $discountValue = $price * $discount/100;

        return number_format($price - $discountValue,2);

    }

    /**
     * @param int $tax
     * @param int $price
     * @return float|int
     */
    private function getLineTax($tax = 0, $price = 0)
    {
        return number_format($price * $tax/100, 4);
    }

    /**
     * @param $calculatedLines
     * @return string
     */
    private function getInvoiceTotal($calculatedLines)
    {
            $total = $calculatedLines->sum('total') + $this->getInvoiceTax($calculatedLines);
            return number_format($total, 2);
    }

    /**
     * @param $calculatedLines
     * @return string
     */
    private function getInvoiceTax($calculatedLines)
    {
        return number_format($calculatedLines->sum('tax_due'), 2);
    }


}
