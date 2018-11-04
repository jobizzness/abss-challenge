<?php

use App\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id'       => '90192182-2f83-40cb-b324-ce4a43dd0024',
            'name'      => 'Milk 1L',
            'tax'       =>  5,
            'price'     => '6.80'],

            ['id'       => 'c2f5b5b6-d85d-41bb-9651-bea30cc880b0',
            'name'      => 'Udang 200g',
            'tax'       =>  5,
            'price'     => '13.5504'],

            ['id'       => '49721cc3-d820-41ce-880d-b854d1724a7e',
            'name'      => 'Evian Water 1L',
            'tax'       =>  0,
            'price'     => '7.10'],

            ['id'       => '8439f607-c4b9-42d1-bbb0-2aa89d1edc72',
            'name'      => 'Maggi Noodles 6 pack',
            'tax'       =>  5,
            'price'     => '12.90'],

            ['id'       => '5c485313-f49f-4112-8349-7611a120bd38',
            'name'      => 'Maggi Noodles 6 pack',
            'tax'       =>  5,
            'price'     => '12.90'],

            ['id'       => 'f2cbada8-7b0e-45a1-a2d7-b0a27a85efda',
            'name'      => 'Delivery Charge',
            'tax'       =>  10,
            'price'     => '9.50'],
        ];

        collect($data)->each(function($item){
            Item::create($item);
        });

    }
}
