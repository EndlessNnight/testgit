<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contribute;
use App\Repositories\ContributeRepository;
use App\Repositories\PeriodicalTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ContributeController extends AdminController
{
    protected $contribute;
    protected $periodicalType;

    function __construct(ContributeRepository $contribute,PeriodicalTypeRepository $periodicalType)
    {
        parent::__construct();
        $this->contribute = $contribute;
        $this->periodicalType = $periodicalType;
        $this->setDashboard('稿件管理',route('admin.contribute'));
    }

    public function getIndex(Request $request){
        $this->setDashboard('稿件列表');
        $search = $request->input('search');
        $status = $request->input('status');
        $data = $this->contribute->getList($search,$status);
        $typeList =  $this->periodicalType->getLevelList();
        $now_type = [];
        $this->setParams(compact('data','now_type','typeList','search','status'));
        return $this->setView('admin.contribute.index');
    }

    public function getEditor(Request $request){
        $this->setDashboard('稿件编辑');
        $id = $request->input('id');
        $data = $model = $this->contribute::find($id);
        $now_type = [];
        if(!empty($id)){
            $now_type = $this->periodicalType->find($data['type_id']);
        }
        $typeList =  $this->periodicalType->getLevelList();
        return editor('admin.contribute.editor',compact('data','now_type','model','typeList'));
    }

    public function postStore(Request $request){
        $post = $request->only('id','name','tel','phone','email','address','QQ','expect_time','article_title','purpose','comment','status','level','type_id');

        $this->contribute->store($post);
        return return_response('操作成功',200,['url' => url()->previous()]);
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $this->contribute->delete($id);
        return return_response('删除成功',200,['url' => url()->previous()]);
    }

    public function downloadFile($contribute_id){
        $contribute = Contribute::with(['file_info','periodical'])->find($contribute_id);
        if(!empty($contribute->file_info->url)){
            $file_name = $contribute->file_info->name;
            $cache_arr = explode('.',$file_name);
            $extension = array_pop($cache_arr);
            $periodical_name = !empty($contribute->periodical)?$contribute->periodical->name:'--';
            $file_name = $contribute->name."-"."《".$periodical_name."》-".$contribute->article_title."-".$contribute->tel;
            if(!empty($contribute->QQ)){
                $file_name .= '-'.$contribute->QQ;
            }
            $file_name .= '.'.$extension;
            $file_path = public_path($contribute->file_info->url);
            return response()->download($file_path, $file_name,[
                'Content-Type'  => filetype($file_path),
            ]);
        }else{
            return response('文件调取失败');
        }
    }
}
