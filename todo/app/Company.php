<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  const STATUS = [
    1 => [ 'label' => '未着手', 'class' => 'label-danger' ],
    2 => [ 'label' => '着手中', 'class' => 'label-info' ],
    3 => [ 'label' => '完了', 'class' => '' ],
];
public function employee()
 {
     return $data->hasOne('App\Models\Employee');
 }

}
