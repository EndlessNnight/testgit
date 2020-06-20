<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    public const FIELDS = [
        'title' => '新闻标题',
        'type'    =>  '新闻类型',
        'release_time' => '发布时间',
        'keyword'   =>  '关键词',
        'description'   =>  '简介',
    ];

    public const POSITION_HOME_REPORT = 1;
    public const POSITION_REPORT    = 2;
    public const POSITION_POLICY    = 3;
    public const POSITION_PUBLISH   = 4;

    public static $recommend = [1 => '推荐'];

}
