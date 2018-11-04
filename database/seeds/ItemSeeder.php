<?php

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

        ];

        foreach ($data as $item){
            Item::create();
        }
    }
}
