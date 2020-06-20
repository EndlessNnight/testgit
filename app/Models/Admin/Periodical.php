<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Periodical extends Model
{
    protected $table = 'periodical';

    const LEVEL_PROVINCIAL = 1;
    const LEVEL_COUNTRY = 2;
    const LEVEL_CORE = 3;

    const LEVEL_ARRAY = [
        self::LEVEL_PROVINCIAL  => '省级',
        self::LEVEL_COUNTRY     => '国家级别',
        self::LEVEL_CORE        => '核心期刊',
    ];

    public const RECOMMEND_HOME_FLASH = 1;
    public const RECOMMEND_HOME_QUALITY = 2;
    public const RECOMMEND_HOME_TOP = 3;
    public const RECOMMEND_HOME_FOOTER = 4;

    public static $recommendData = [
        self::RECOMMEND_HOME_FLASH      => ['name'=>'首页banner','max' => 6],
        self::RECOMMEND_HOME_QUALITY    => ['name'=>'精品推荐','max' => 20],
        self::RECOMMEND_HOME_TOP        => ['name'=>'首页广告top','max' => 1],
        self::RECOMMEND_HOME_FOOTER     => ['name'=>'首页广告footer','max' => 1],
    ];

    const FIELDS = [
        'name' => '期刊名称',
        'img_url' => '期刊封面',
        'level' => '期刊等级',
        'responsible' => '主管单位',
        'sponsor' => '主办单位',
        'international_ornp' => '国际刊号',
        'internal_ornp'     =>  '国内刊号',
        'employ_web_text' => '收录网站',
//        'synopsis' => '杂志介绍',
//        'employ_impact' => '收录情况/影响因子',
//        'columns' => '栏目设置',
//        'demand' => '征稿要求',
    ];

    public function type(){
        return $this->hasOne('App\Models\Admin\PeriodicalType','id','type_id')->with('topType');
    }


}
