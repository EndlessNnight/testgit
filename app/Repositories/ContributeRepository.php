<?php

namespace App\Repositories;

use App\Models\Contribute;
use Illuminate\Support\Arr;

class ContributeRepository
{

    public function getAll(){
        return Contribute::all();
    }

    public function getList($search='',$status='all'){
        return Contribute::with(['periodical','file_info'])
            ->where(function ($query) use ($search){
                if(!empty($search)){
                    return $query
                        ->where('identifier','like','%'.$search.'%')
                        ->orWhere('article_title','like','%'.$search.'%')
                        ->orWhere('phone','like','%'.$search.'%')
                        ->orWhere('tel','like','%'.$search.'%')
                        ->orWhere('contribute.name','like','%'.$search.'%');
                }
            })
            ->where(function ($query) use ($status){
                if(isset($status)){
                    return $query->where('status',$status);
                }
            })
            ->orderBy('contribute.id','desc')
            ->paginate(config('s.pag'));
    }

    public static function find($id){
        return Contribute::find($id);
    }

    public function delete($id){
        return Contribute::where('id',$id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
    }

    public function store($inputs){
        $id = Arr::pull($inputs, 'id');
        $model = new Contribute;
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

    public function getCountForTime($start_time,$end_time,$status=''){
        return Contribute::where('created_at','>=',$start_time)
            ->where('created_at','<=',$end_time)
            ->where(function ($query) use ($status){
                if($status != ''){
                    return $query->where('status',$status);
                }
            })
            ->count();
    }

}
