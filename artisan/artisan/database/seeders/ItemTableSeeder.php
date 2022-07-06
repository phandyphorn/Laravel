<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name'=>'Pen', 'price'=>500],
            ['name'=>'Pen', 'price'=>500],
            ['name'=>'Pen', 'price'=>500]
        ];

        foreach($items as $item){
            Item::create($item);
        }
    }
}
