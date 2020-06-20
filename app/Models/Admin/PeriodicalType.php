<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeriodicalType extends Model
{
    use SoftDeletes;
    protected $table = 'periodical_type';

    public function topType(){
        return $this->hasOne('App\Models\Admin\PeriodicalType','id','pid');
    }

}
