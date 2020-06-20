<?php

namespace App\Repositories;

use App\Models\Admin\Employ;
use Illuminate\Support\Arr;

class EmployRepository
{

    public function getAll(){
        return Employ::orderBy('reorder')->orderBy('id')->all();
    }

    public function getCheckList($field='name'){
        $res =  Employ::orderBy('reorder')->orderBy('id')->get()->toArray();
        $res = array_combine(array_column($res,'id'),array_column($res,$field));
        return $res;
    }

    public function getList(){
        return Employ::orderBy('reorder')->orderBy('id')->paginate(config('s.pag'));
    }

    public static function find($id){
        return Employ::find($id);
    }

    public function delete($id){
        return Employ::where('id',$id)->delete();
    }

    public function store($inputs){
        $id = Arr::pull($inputs, 'id');
        $model = new Employ;
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

}
