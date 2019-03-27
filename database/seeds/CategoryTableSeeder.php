<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categories')->insert(
           [
        	[
           
            'name' => 'Casino',
            'created_at'=>new Datetime(),

        ],
        [
            'name' => 'Casino',
            'created_at'=>new Datetime(),


        ],
        [
            'name' => 'Casino',
            'created_at'=>new Datetime(),

        ],
        [
            'name' => 'Casino',
            'created_at'=>new Datetime(),


        ],
      ]
     );
    }
}
