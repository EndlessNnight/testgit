<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Config;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    protected $dashboard = [];
    protected $params = [];

    public function __construct()
    {
        $config = Config::get()->toArray();
        $config = array_combine(array_column($config,'identify'),array_column($config,'content'));
        view()->share(compact('config'));
    }

    public function logout(){
        Auth::logout();
        return redirect(route('admin.login'));
    }

    public function getUserInfo(){
        return view('admin.user.index');
    }

    public function updateUserPassword(Request $request){
        $post = $request->only('password_old','password_new','password_confirm');
        $user = Auth::guard('admin')->user();
        $hs_pwd = Hash::make($post['password_old']);

        if(!Hash::check($post['password_old'],$user->password)){
            return return_response("旧密码不正确！",500,['pwd' => $hs_pwd]);
        }else if($post['password_new'] !== $post['password_confirm']){
            return return_response("两次输入密码不一致！",500);
        }else{
            $user->password = bcrypt($post['password_new']);
            $user->save();
            return return_response("密码修改成功",200,['url' => route('admin.logout')]);
        }
    }

    public function updateUserInfo(Request $request){
        $file_id = $request->all('file_id');
        $file_info = File::where('id',$file_id)->first();
        $head_img_url = $file_info->url;
        $user = Auth::guard('admin')->user();
        $user->head_img = $head_img_url;
        $user->save();
        return return_response("头像修改成功",200);
    }

    protected function setDashboard($name,$route=''){
        if(gettype($name) == 'array'){
            if(isset($name[0]) && gettype($name[0]) == 'array'){
                $this->dashboard[$name[0]] = !empty($name[1])?$name[1]:'';
            }else{
                $this->dashboard[$name[0]] = '';
            }
        }else{
            $this->dashboard[$name] = $route;
        }
    }

    protected function setParams(Array $params){
        foreach ($params as $k => $v){
            $this->params[$k] = $v;
        }
    }

    protected function setView($view){
        $params = $this->params;
        $params['dashboard'] = $this->dashboard;
        return view($view,$params);
    }

}
