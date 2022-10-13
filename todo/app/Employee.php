<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $primaryKey = 'employee_id';

  const STATUS = [
    1 => [ 'label' => '未着手', 'class' => 'label-danger' ],
    2 => [ 'label' => '着手中', 'class' => 'label-info' ],
    3 => [ 'label' => '完了', 'class' => '' ],
  ];

  public function company()
    {

        return $data->belongsTo('App\Models\Company');
    }
  public function getPosts()
   {
       return $data
           ->find(1)
           ->posts()
           ->get();
   }
}
