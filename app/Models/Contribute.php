<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contribute extends Model
{
    use SoftDeletes;
    protected $table = 'contribute';

    public const STATUS_ARRAY = [
        0 => '审核中',
        1 => '已录用',
        2 => '未通过',
        3 => '已取消',
    ];

    public const PURPOSE_ARRAY = [
	0 => '--',
        1 => '普通投稿',
        2 => '职称、评级、毕业论文等',
    ];

    public function periodical(){
        return $this->hasOne('App\Models\Admin\Periodical','id','periodical_id');
    }

    public function periodicalName(){
        return $this->hasOne('App\Models\Admin\Periodical','id','periodical_id')->select(['id', 'name']);
    }

    public function file_info(){
        return $this->hasOne('App\Models\File','id','file');
    }
}
