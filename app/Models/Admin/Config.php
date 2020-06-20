<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'admin_config';

    const FIELDS = [
        'identify' => '唯一标示',
        'name' => '配置项',
        'synopsis' => '简介',
        'content' => '配置内容',
    ];
}
