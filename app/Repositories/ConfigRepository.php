<?php

namespace App\Repositories;

use App\Models\Admin\Config;
use Illuminate\Support\Arr;

class ConfigRepository
{

    public function getAll(){
        return Config::all();
    }

    public function getList(){
        return Config::paginate(config('s.pag'));
    }

    public static function find($id){
        return Config::find($id);
    }

    public function store($inputs){
        $id = Arr::pull($inputs, 'id');
        $config = new Config;
        if ($id) {
            unset($inputs['id']);
            return $config->where('id',$id)->update($inputs);
        } else {
            return $config->insert($inputs);
        }
    }

}
