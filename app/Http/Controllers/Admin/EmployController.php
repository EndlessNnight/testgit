<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Employ;
use App\Repositories\EmployRepository;
use Illuminate\Http\Request;

class EmployController extends AdminController
{
    protected $employ;

    function __construct(EmployRepository $employ)
    {
        parent::__construct();
        $this->employ = $employ;
        $this->setDashboard('收录管理',route('admin.employ'));
    }

    public function getIndex(){
        $this->setDashboard('收录列表');
        $data = $this->employ->getList();
        $heads = Employ::FIELDS;
        $this->setParams(compact('data','heads'));
        return $this->setView('admin.employ.index');
    }

    public function getEditor(Request $request){
        $id = $request->input('id');
        $model = $this->employ::find($id);
        return editor('admin.employ.editor', [
            'model' => $model,
        ]);
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $this->employ->delete($id);
        return return_response('删除成功',200,['url' => url()->previous()]);
    }

    public function postStore(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'short_name' => 'required',
        ],[
            'name.required'      =>  '收录网站名称不能为空！',
            'short_name.required' =>  '网站短名称不能为空！',
        ]);
        $post = $request->only('id','name','short_name','reorder');
        $this->employ->store($post);
        return return_response('操作成功',200,['url' => url()->previous()]);
    }

}
