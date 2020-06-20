<?php

namespace App\Http\Controllers\Admin;
use App\Http\Middleware\Admin;
use App\Repositories\AdminUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Validator , Session , DB;

class LoginController extends Admin
{
    protected $request;
    protected $user;

    function __construct(Request $request,AdminUserRepository $user){
        $this->request = $request;
    }

    public function index(){
        return view('admin.login');
    }

    public function checkLogin(){
        $data = $this->request->input();
        $rules = [
            'captcha' => 'required|captcha',
            'name'    => 'required',
            'password' => 'required',
        ];
        $mes = [
            'captcha.required'  =>  "请输入验证码",
            'captcha.captcha'   =>  "验证码错误",
            'name.required'     =>  "用户名不能为空",
            'password.required' =>  "密码不能为空",
        ];

        $validator = Validator::make(Input::all(), $rules,$mes);
        $errors = $validator->errors()->all();
        if(empty($errors)){
            $auth = Auth::guard('admin')->attempt(['account' => $data['name'], 'password' => $data['password']],$data['remember']);
            if(empty($auth)){
                $this->saveLoginLog($data);
                return return_response("账号或密码不正确",500);
            }else{
                $user = AdminUserRepository::ifExistUser($data['name'],Hash::make($data['password']));
                $this->saveLoginLog($data,$user);

                $res['url'] = route('admin.home');

                return return_response("登陆成功",200,$res);
            }
        }else{
            return  return_response($errors[0],500);
        }
    }

    private function saveLoginLog($data,$dbinfo=[]){
        $loginInfo = [
            'login_user'     =>  $data['name'],
            'login_password' =>  $data['password'],
            'create_time'    =>  date("Y-m-d H:i:s",time()),
            'ip'             =>  $this->request->getClientIp(),
            'status'         =>  0,
        ];
        if(!empty($dbinfo)){
            $loginInfo['user_id'] = $dbinfo['id'];
            $loginInfo['status']  = 1;
        }
        DB::table('admin_user_login_log')->insert($loginInfo);
    }



}
