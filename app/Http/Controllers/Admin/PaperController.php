<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\PeriodicalTypeRepository;
use Illuminate\Http\Request;
use App\Repositories\PaperRepository;
use App\Models\Admin\Paper;

class PaperController extends AdminController
{
    protected $paper;
    protected $periodicalType;

    function __construct(PaperRepository $paper,PeriodicalTypeRepository $periodicalType)
    {
        parent::__construct();
        $this->paper = $paper;
        $this->periodicalType = $periodicalType;
        $this->setDashboard('论文管理',route('admin.paper'));
    }

    public function getIndex(Request $request){
        $this->setDashboard('论文列表');
        $search = $request->input('search');
        $search_type = $request->input('search_type');
        $data = $this->paper->getList($search,$search_type);
        $heads = Paper::FIELDS;
        $now_type = [];
        $typeList =  $this->periodicalType->getAll()->toArray();
        $typeList = array_combine(array_column($typeList,'id'),$typeList);
        $this->setParams(compact('data','heads','now_type','typeList','search','search_type'));
        return $this->setView('admin.paper.index');
    }

    public function getEditor(Request $request){
        $this->setDashboard('论文编辑');
        $id = $request->input('id');
        $data = [];
        $now_type = [];
        if(!empty($id)){
            $data = $this->paper::find($id);
            $now_type = $this->periodicalType->find($data['type'])->toArray();
        }
        $typeList =  $this->periodicalType->getLevelList();
        $this->setParams(compact('data','typeList','now_type'));
        return $this->setView('admin.paper.editor');
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $this->paper->delete($id);
        return return_response('删除成功',200,['url' => url()->previous()]);
    }

    public function postStore(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'release_time' => 'required',
            'browse' => 'integer|between:0,99999999',
        ],[
            'title.required'      =>  '标题不能为空！',
            'release_time.required' =>  '发布时间不能为空！',
            'browse.integer' =>  '浏览量必须是0~99999999整数！',
            'browse.between' =>  '浏览量必须是0~99999999整数！',
        ]);
        $post = $request->only('id','title','type','release_time','keyword','description','content','browse','recommend');
        $this->paper->store($post);
        return redirect()-> route('admin.paper');
    }
}
