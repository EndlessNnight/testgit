<?php

namespace App\Repositories;

use App\Models\Admin\AdminUser;
use Illuminate\Support\Arr;

class AdminUserRepository
{

    public static function ifExistUser($user,$pwd){
        return AdminUser::where([['account',$user],['password',$pwd]])->first();
    }

    public static function saveUser($inputs){
        $id = Arr::pull($inputs, 'id');
        $adminUser = new AdminUser;
        if ($id) {
            unset($inputs['id']);
            return $adminUser->where('id',$id)->update($inputs);
        } else {
            return $adminUser->insert($inputs);
        }
    }
}
