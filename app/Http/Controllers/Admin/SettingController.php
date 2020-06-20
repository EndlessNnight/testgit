<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Config;
use App\Repositories\ConfigRepository;
use Illuminate\Http\Request;

class SettingController extends AdminController
{
    protected $config;

    function __construct(ConfigRepository $config)
    {
        parent::__construct();
        $this->config = $config;
        $this->setDashboard('网站设置',route('admin.setting'));
    }

    public function getIndex(){
        $this->setDashboard('设置列表');
        $settings = $this->config->getList();
        $heads = Config::FIELDS;
        $this->setParams(compact('settings','heads'));
        return $this->setView('admin.setting.index');
    }

    public function getEditor($id){
        $model = $this->config::find($id);
        return editor('admin.setting.editor', [
            'model' => $model,
        ]);
    }

    public function postStore(Request $request){
        $this->validate($request, [
            'content' => 'required',
        ],[
            'content.required'      =>  '配置内容不能为空！',
        ]);
        $post = $request->only('id','content');
        $this->config->store($post);
        return return_response('修改成功',200,['url' => route('admin.setting')]);
    }

}
