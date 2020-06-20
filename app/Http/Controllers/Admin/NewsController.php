<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\News;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;
use App\Models\File;

class NewsController extends AdminController
{
    protected $news;

    function __construct(NewsRepository $news)
    {
        parent::__construct();
        $this->news = $news;
        $this->setDashboard('新闻管理',route('admin.news'));
    }

    public function getIndex(Request $request){
        $this->setDashboard('新闻列表');
        $search = $request->input('search');
        $search_type = $request->input('search_type');
        $data = $this->news->getList($search,$search_type);
        $heads = News::FIELDS;
        $news_type = $this->news->getTypeList();
        $news_type = array_combine(array_column($news_type,'id'),array_column($news_type,'name'));
        $this->setParams(compact('data','heads','news_type','search','search_type'));
        return $this->setView('admin.news.index');
    }

    public function getEditor(Request $request){
        $this->setDashboard('新闻编辑');
        $id = $request->input('id');
        $data = [];
        if(!empty($id)){
            $data = $this->news::find($id);
        }
        $news_type = $this->news->getTypeList();
        $news_type = array_combine(array_column($news_type,'id'),array_column($news_type,'name'));
        $this->setParams(compact('data','news_type'));
        return $this->setView('admin.news.editor');
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $this->news->delete($id);
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
        $post = $request->only('id','title','type','release_time','keyword','description','content','browse','recommend','recommend_img','recommend_img_id');

        if(!empty($post['recommend_img_id'])){
            $file_info = File::find($post['recommend_img_id']);
            $post['recommend_img'] = !empty($file_info['url'])?$file_info['url']:$post['recommend_img'];

        }else{
            $post['recommend_img'] = '';
        }
        unset($post['recommend_img_id']);

        if(!empty($post['recommend'][0])){
            $post['recommend'] = $post['recommend'][0];
        }

        $this->news->store($post);
        return redirect()-> route('admin.news');
    }

}
