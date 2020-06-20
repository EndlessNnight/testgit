<?php

namespace App\Repositories;

use App\Models\Admin\Paper;
use App\Models\Admin\Periodical;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\PeriodicalType;

class PaperRepository
{
    public function getOne($id){
        return Paper::with('paperType')->find($id);
    }

    public function getAll(){
        return Paper::all();
    }

    public function getList($search='',$type='all',$num=0){
        if(empty($num)){ $num = config('s.pag');}
        $type_ids = 'all';
        if(!empty($type) && $type !== 'all'){
            $type_list = PeriodicalType::where('pid',$type)->get()->toArray();
            $type_ids = array_column($type_list,'id');
        }
        return Paper::where(function ($query) use ($search){
            if(!empty($search)){
                return $query->where('title','like','%'.$search.'%');
            }
        })
            ->where(function ($query) use ($type_ids){
                if($type_ids != 'all'){
                    return $query->whereIn('type',$type_ids);
                }
            })->orderBy('release_time','desc')->orderBy('id','desc')->paginate($num);
    }

    public function getListForNumber($num=8){
        return Paper::orderBy('release_time','desc')->orderBy('id','desc')
            ->offset(0)->limit($num)->get();
    }

    public function getListForType($type=0,$pagNum=25){
        $type_ids = null;
        if(!empty($type)){
            $the_type = PeriodicalType::find($type);
            if($the_type['pid'] == 0){
                $type_list = PeriodicalType::where('pid',$the_type['id'])->get()->toArray();
                $type_ids = array_column($type_list,'id');
            }else{
                $type_ids = [$the_type['id']];
            }
        }
        return Paper::where(function ($query) use ($type_ids){
            if(!empty($type_ids)){
                return $query->whereIn('type',$type_ids);
            }
        })->orderBy('release_time','desc')->paginate($pagNum);

    }

    public static function find($id){
        return Paper::find($id);
    }

    public function delete($id){
        return Paper::where('id',$id)->delete();
    }

    public function browseOnce($id){
        Paper::where('id', $id)->increment('browse', 1);
    }

    public function store($inputs){
        $id = Arr::pull($inputs, 'id');
        $paper = new Paper;
        $time = date('Y-m-d H:i:s');
        $inputs['updated_at'] = $time;
        if ($id) {
            unset($inputs['id']);
            return $paper->where('id',$id)->update($inputs);
        } else {
            $inputs['created_at'] = $time;
            return $paper->insert($inputs);
        }
    }

    public function getListFormNum($position = 'all',$num=100,$offect=0){
        $news = new Paper();
        if($position != 'all'){
            $news->where('type',$position);
        }
        return $news->offset($offect)->limit($num)->get();
    }

    public function getRecommend($num){
        return Paper::where('recommend',1)
            ->orderBy('id','desc')
            ->offset(0)->limit($num)->get();
    }

    /**
     * 获取所有分类下 $max_per_record条记录
     * @param $max_per_record 每个分类下最大记录值
     */
    public function getHomeList($max_per_record){
        $sql = "
           SELECT 
            `p`.`id`,
            `p`.`title`,
            `p`.`type`,
            `periodical_type`.`pid` as tid,
            `periodical_type`.`pid` % {$max_per_record} as gain_id,
            CONCAT(`periodical_type`.`pid`,`p`.`id` % {$max_per_record}) as concat_id
            FROM paper as p
            left join periodical_type on periodical_type.id = p.type
            GROUP BY concat_id
            ORDER BY p.id
        ";
        return DB::select($sql);
    }

}
