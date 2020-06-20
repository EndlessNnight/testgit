<?php

namespace App\Repositories;

use App\Models\Admin\News;
use App\Models\Admin\NewsType;
use Illuminate\Support\Arr;

class NewsRepository
{

    public function getAll(){
        return News::all();
    }

    public function getList($search='',$type=''){
        return News::where(function ($query) use ($search){
            if(!empty($search)){
                return $query->where('title','like','%'.$search.'%');
            }
        })
            ->where(function ($query) use ($type){
                if(isset($type)){
                    return $query->where('type',$type);
                }
            })->orderBy('id','desc')->paginate(config('s.pag'));
    }

    public function getListForType($type = 0,$num=0){
        if(empty($num)){
            $num = config('s.pag');
        }
        return News::where(function ($query) use ($type){
            if(!empty($type)){
                return $query->where('type',$type);
            }
        })->orderBy('id','desc')->paginate($num);
    }

    public static function find($id){
        return News::find($id);
    }

    public function browseOnce($id){
        News::where('id', $id)->increment('browse', 1);
    }

    public function delete($id){
        return News::where('id',$id)->delete();
    }

    public function store($inputs){
        $id = Arr::pull($inputs, 'id');
        $news = new News;
        $time = date('Y-m-d H:i:s');
        $inputs['updated_at'] = $time;
        if ($id) {
            unset($inputs['id']);
            return $news->where('id',$id)->update($inputs);
        } else {
            $inputs['created_at'] = $time;
            return $news->insert($inputs);
        }
    }

    public function getListFormNum($position = 'all',$num=100,$offect=0){
        $news = new News();
        if($position != 'all'){
            $news = $news->where('type',$position);
        }
        return $news->orderBy('id','desc')->offset($offect)->limit($num)->get();
    }

    public function getTypeList(){
        return NewsType::get()->toArray();
    }

    public function findType($id){
        return NewsType::find($id);
    }

    public function getRecommendList($offect=0,$num=6){
        return News::where('recommend',1)->orderBy('id','desc')->offset($offect)->limit($num)->get()->toArray();
    }

}
