<?php

namespace App\Repositories;

use App\Models\Admin\Page;
use Illuminate\Support\Arr;

class PageRepository
{

    public function getAll(){
        return Page::all();
    }

    public function getList(){
        return Page::orderBy('id','desc')->paginate(config('s.pag'));
    }

    public static function find($id){
        return Page::find($id);
    }

    public function delete($id){
        return Page::where('id',$id)->delete();
    }

    public function getOneForUnique($value){
        return Page::where('unique',$value)->first();
    }

    public function store($inputs){
        $id = Arr::pull($inputs, 'id');
        $model = new Page;
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

    public function getNavList(){
        $list = Page::select('name','unique','extend')->where('isdel','-1')->get();
        if(empty($list)){
           return [];
        }else{
            $list = $list->toArray();
        }
        return array_combine(array_column($list,'extend'),$list);
    }

}
