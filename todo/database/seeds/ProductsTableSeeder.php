<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          DB::table('products')->insert([
              'name' => '焼きそば',
              'price' => '900',
              'image' => '画像',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ]);
    }
}
