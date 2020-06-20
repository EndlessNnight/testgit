<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Periodical;
use App\Models\Admin\PeriodicalFile;
use App\Models\File;
use App\Repositories\PeriodicalRepository;
use App\Repositories\EmployRepository;
use App\Repositories\PeriodicalTypeRepository;
use Illuminate\Http\Request;

class PeriodicalController extends AdminController
{
    protected $periodical;
    protected $employ;
    protected $periodicalType;

    function __construct(PeriodicalRepository $periodical,EmployRepository $employ,PeriodicalTypeRepository $periodicalType)
    {
        parent::__construct();
        $this->periodical = $periodical;
        $this->employ = $employ;
        $this->periodicalType = $periodicalType;
        $this->setDashboard('期刊管理',route('admin.periodical'));

    }

    public function getIndex(Request $request){
        $this->setDashboard('期刊列表');
        $search = $request->input('search');
        $search_type = $request->input('search_type');
        $data = $this->periodical->getList($search,$search_type);

        //收录列表
        $employData = $this->employ->getCheckList();
        //推荐位
        $recommendData = array_combine(array_keys(Periodical::$recommendData),array_column(Periodical::$recommendData,'name'));
        foreach ($data as $key => $item){
            if(empty($data[$key]->employ_web)) {
                $data[$key]->employ_web = [];
            }else{
                $data[$key]->employ_web = explode(',',$item->employ_web);
                $data[$key]->employ_web_text = '';
                foreach ($data[$key]->employ_web as $k => $v){
                    $data[$key]->employ_web_text .= $employData[$v].'</br>';
                }
            }
            if(empty($data[$key]->recommend)) {
                $data[$key]->recommend_list = [];
            }else{
                $data[$key]->recommend_list  = explode(',',$item->recommend);
                $data[$key]->recommend_text = '';
                foreach ($data[$key]->recommend_list as $k => $v){
                    $data[$key]->recommend_text .= $recommendData[$v].'</br>';
                }

            }
        }

        $heads = Periodical::FIELDS;
        $typeList =  $this->periodicalType->getLevelList();
        $now_type = [];
        $this->setParams(compact('data','employData','typeList','heads','now_type','recommendData','search','search_type'));
        return $this->setView('admin.periodical.index');
    }

    public function getEditor(Request $request){
        $id = $request->input('id');
        $data = $model = $this->periodical::find($id);
        $employData = $this->employ->getCheckList();
        $recommendData = array_combine(array_keys(Periodical::$recommendData),array_column(Periodical::$recommendData,'name'));
        $now_type = [];
        if(!empty($id)){
            $now_type = $this->periodicalType->find($data['type_id']);
        }
        $typeList =  $this->periodicalType->getLevelList();
        return editor('admin.periodical.editor', compact('employData','model','data','typeList','now_type','recommendData'));
    }

    public function getCovers($id){
        $covers = $model = PeriodicalFile::where('periodical_id',$id)
            ->leftJoin('files','files.id','=','periodical_file.file_id')
            ->get();
        return editor('admin.periodical.covers', compact('covers','id','model'));
    }

    public function coversStore(Request $request){
        $file_id = $request->input('file_id');
        $id = $request->input('id');
        PeriodicalFile::where('periodical_id',$id)->delete();
        if(!empty($file_id) && !empty($id)  && gettype($file_id)){
            $insert_data = array_map(function ($item) use ($id){
                if(!empty($item)){
                    return ['periodical_id' => $id,'file_id' => $item];
                }
            },$file_id);
            $insert_data = array_filter($insert_data);
            PeriodicalFile::insert($insert_data);

        }
        return return_response('封面保存成功',200,['url' => url()->previous()]);
    }

    public function coversDelete(Request $request){
        $file_id = $request->input('file_id');
        $periodical_id = $request->input('periodical_id');
        PeriodicalFile::where('periodical_id',$periodical_id)->where('file_id',$file_id)->delete();
        return return_response('删除成功',200,['file_id' => $file_id]);
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $this->periodical->delete($id);
        return return_response('删除成功',200,['url' => url()->previous()]);
    }

    public function postStore(Request $request){
        $post = $request->only('id','name','img_url','img_url_id','type_id','level','responsible','sponsor','international_ornp','internal_ornp','employ_web','synopsis','employ_impact','columns','demand','recommend','unique','recommend_img','recommend_img_id','postal_code');
        $this->validate($request, [
            'name' => 'required',
            'unique' => 'required'
        ],[
            'name.required'      =>  '期刊名称不能为空！',
            'unique.required'    =>  '唯一标识不能为空',
        ]);

        //验证字符串唯一
        $check = Periodical::where('unique',$post['unique'])->where('id','!=',$post['id'])->first();
        if(!empty($check)){
            return return_response('操作失败',422,['errors' => ['unique' => '标示已存在']]);
        }

        $type = $this->periodicalType->find($post['type_id']);
        if(empty($type) || $type['level'] <= 1){
            return return_response('操作失败',422,['errors' => [
                'type_id' => '分类信息错误！'
            ]]);
        }
        if(!empty($post['employ_web'])){
            $post['employ_web'] = implode(',',$post['employ_web']);
        }

        if(!empty($post['recommend'])){
            $post['recommend'] = implode(',',$post['recommend']);
        }

        if(!empty($post['img_url_id'])){
            $file_info = File::find($post['img_url_id']);
            $post['img_url'] = !empty($file_info['url'])?$file_info['url']:$post['img_url'];

        }else{
            $post['img_url'] = '';
        }
        unset($post['img_url_id']);


        if(!empty($post['recommend_img_id'])){
            $file_info = File::find($post['recommend_img_id']);
            $post['recommend_img'] = !empty($file_info['url'])?$file_info['url']:$post['recommend_img'];

        }else{
            $post['recommend_img'] = '';
        }
        unset($post['recommend_img_id']);


        $this->periodical->store($post);
        return return_response('操作成功',200,['url' => url()->previous()]);
    }

}
