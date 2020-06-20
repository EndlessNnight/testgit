<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table = 'paper';

    public const FIELDS = [
        'title' => '论文标题',
        'type'    =>  '论文类型',
        'release_time' => '发布时间',
        'keyword'   =>  '关键词',
        'description'   =>  '论文概述',
    ];

    public const POSITION_HOME_REPORT = 1;
    public const POSITION_REPORT = 2;
    public const POSITION_POLICY = 3;


    public function paperType(){
        return $this->hasOne('App\Models\Admin\PeriodicalType','id','type')->with('topType');
    }

}
