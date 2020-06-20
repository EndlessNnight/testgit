<?php

namespace App\Repositories;

use App\Models\Admin\News;
use App\Models\Admin\Periodical;
use App\Models\Admin\PeriodicalType;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PeriodicalRepository
{

    public function getAll(){
        return Periodical::all();
    }

    public function getList($search='',$type='all',$order='desc'){
        $type_ids = 'all';
        if(!empty($type) && $type != 'all'){
            $type_list = PeriodicalType::where('pid',$type)->get()->toArray();
            $type_ids = array_column($type_list,'id');
        }

        return Periodical::where(function ($query) use ($search){
                if(!empty($search)){
                    return $query->where('name','like','%'.$search.'%');
                }
            })
            ->where(function ($query) use ($type_ids){
                if($type_ids != 'all'){
                    return $query->whereIn('type_id',$type_ids);
                }
            })->orderBy('id',$order)->paginate(config('s.pag'));
    }

    public function getPaginate(){
        return Periodical::orderBy('id','desc')->paginate(20);
    }

    public function getOneForUnique($unique){
        return Periodical::where('unique',$unique)->with('type')->first();
    }

    public static function find($id){
        return Periodical::find($id);
    }

    public function getTypeIdForPeriodicalId($id){
        $info = Periodical::find($id);
        return $info['type_id'];
    }

    public function delete($id){
        return Periodical::where('id',$id)->delete();
    }

    public function store($inputs){
        $id = Arr::pull($inputs, 'id');
        $model = new Periodical;
        $time = date('Y-m-d H:i:s');
        $inputs['updated_at'] = $time;
        if ($id) {
            return $model->where('id',$id)->update($inputs);
        } else {
            $inputs['created_at'] = $time;
            return $model->insert($inputs);
        }
    }

    public function getListForType($type=0,$pagNum=16){
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

        return Periodical::where(function ($query) use ($type_ids){
            if(!empty($type_ids)){
                return $query->whereIn('type_id',$type_ids);
            }
        })->paginate($pagNum);

    }

    public function getForUnique($unique){
        return Periodical::where('unique',$unique)->first();
    }

    public function getListForWhere($name,$pagNum=16){
        return Periodical::where('name','like','%'.$name.'%')->paginate($pagNum);
    }

    public function getRecommend(){
        $res = [];
        foreach (Periodical::$recommendData as $k => $v){
            $res[$k] = Periodical::select('id','name','unique','img_url','recommend_img')
                ->where('recommend',$k)
                ->orderBy('updated_at','desc')
                ->offset(0)->limit($v['max'])->get()->toArray();
        }
        return $res;
    }

    public function getOneRecommend($recommend_code,$num=10){
        return Periodical::select('id','name','unique','img_url','recommend_img','synopsis')
            ->where('recommend',$recommend_code)
            ->orderBy('updated_at','desc')
            ->offset(0)->limit($num)
            ->get()->toArray();
    }

    /**
     * 获取所有分类下 $max_per_record条记录
     * @param $max_per_record 每个分类下最大记录值
     */
    public function getHomeList($max_per_record){
        $sql = "
           SELECT 
            `p`.`name`,
            `p`.`img_url`,
            `p`.`type_id`,
            `p`.`unique`,
            `periodical_type`.`pid` as tid,
            `periodical_type`.`pid` % {$max_per_record} as gain_id,
            CONCAT(`periodical_type`.`pid`,`p`.`id`  % {$max_per_record}) as concat_id
            FROM periodical as p
            left join periodical_type on periodical_type.id = p.type_id
            GROUP BY concat_id
            ORDER BY p.id
        ";
        return DB::select($sql);
    }

}
