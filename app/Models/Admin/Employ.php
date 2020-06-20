<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Employ extends Model
{
    protected $table = 'employs';

    const FIELDS = [
        'name' => '收录名称',
        'short_name' =>  '短名称',
        'reorder'    =>  '排序(越小越靠前)',
    ];

}
