<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
       DB::table('images')->insert(
           [
            [
              
            'path' => '/images/bc5983064c0fc4cb8fea39e1086b8578dong-ho-seiko-sndf93p1-nam-pin-day-da-a.jpg',
            'product_id' => '1',
            'created_at'=>new Datetime(),

        ],
        [
           
            'path' => '/images/bc5983064c0fc4cb8fea39e1086b8578dong-ho-seiko-sndf93p1-nam-pin-day-da-a.jpg',
            'product_id' => '2',
            'created_at'=>new Datetime(),

        ],
        [
          
            'path' => '/images/bc5983064c0fc4cb8fea39e1086b8578dong-ho-seiko-sndf93p1-nam-pin-day-da-a.jpg',
            'product_id' => '3',
            'created_at'=>new Datetime(),

        ],
        [
           
            'path' => '/images/bc5983064c0fc4cb8fea39e1086b8578dong-ho-seiko-sndf93p1-nam-pin-day-da-a.jpg',
            'product_id' => '4',
            'created_at'=>new Datetime(),

        ],
      ]
     );
    }
}

