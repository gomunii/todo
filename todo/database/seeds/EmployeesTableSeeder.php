<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $names = ['わたる', 'てら', '久保さん'];

      foreach ($names as $name) {
          DB::table('employees')->insert([
              'name' => $name,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ]);
        }
    }
}
