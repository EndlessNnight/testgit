<?php

namespace App\Repositories;

use App\Models\Admin\PeriodicalType;
use Illuminate\Support\Arr;

class PeriodicalTypeRepository
{

    public function getAll(){
        return PeriodicalType::all();
    }

    public function getList(){
        return PeriodicalType::paginate(config('s.pag'));
    }

    public static function find($id){
        return PeriodicalType::find($id);
    }

    public function getListForLevel($level){
        return PeriodicalType::where('level',$level)->get();
    }

    public function delete($id){
        return PeriodicalType::where('id',$id)->delete();
    }

    public function store($inputs){
        $id = Arr::pull($inputs, 'id');
        $model = new PeriodicalType;
        $time = date('Y-m-d H:i:s');
        $inputs['updated_at'] = $time;
        if ($id) {
            unset($inputs['id']);
            return $model->where('id',$id)->update($inputs);
        } else {
            $inputs['created_at'] = $time;
            return $model->insert($inputs);
        }
    }

    public function getLevelList(){
        $data = PeriodicalType::orderBy('reorder')->orderBy('id')->get()->toArray();
        $data = array_combine(array_column($data,'id'),$data);
        $topType = array_map(function ($item){
            if($item['pid'] == 0) {
                $item['list'] = [];
                return $item;
            }
        },$data);

        $topType = array_filter($topType);
        foreach ($data as $key => $val){
            if(!empty($val['pid'])){
                $topType[$val['pid']]['list'][] = $val;
            }
        }
        return $topType;
    }

}
