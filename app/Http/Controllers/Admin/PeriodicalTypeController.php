<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\PeriodicalType;
use App\Repositories\PeriodicalTypeRepository;
use Illuminate\Http\Request;

class PeriodicalTypeController extends AdminController
{
    protected $periodicalType;
    protected $employ;

    function __construct(PeriodicalTypeRepository $periodicalType)
    {
        parent::__construct();
        $this->periodicalType = $periodicalType;
        $this->setDashboard('期刊分类管理',route('admin.periodical.type'));
    }

    public function getIndex(Request $request){
        $this->setDashboard('分类列表');
        $topType = $this->periodicalType->getLevelList();
        $data = $topType;
        $pid = !empty($request->input('pid'))?$request->input('pid'):0;
        if(!empty($pid)){
            unset($data);
            $data[] = $topType[$pid];
        }
        $this->setParams(compact('topType','data','pid'));
        return $this->setView('admin.periodical-type.index');
    }

    public function getEditor(Request $request){
        $id = $request->input('id');
        $model = $this->periodicalType::find($id);
        $topType = $this->periodicalType->getListForLevel(1);
        return editor('admin.periodical-type.editor', [
            'model' => $model,
            'data' => $model,
            'topType' => $topType
        ]);
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $this->periodicalType->delete($id);
        return return_response('删除成功',200,['url' => url()->previous()]);
    }

    public function postStore(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ],[
            'name.required'      =>  '分类名称不能为空！',
        ]);
        $post = $request->only('id','name','pid','reorder');
        $post['level'] = empty($post['pid'])?1:2;
        $this->periodicalType->store($post);
        return return_response('操作成功',200,['url' => url()->previous()]);
    }

}
