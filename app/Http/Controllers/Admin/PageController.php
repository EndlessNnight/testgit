<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Page;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;

class PageController extends AdminController
{
    protected $page;

    function __construct(PageRepository $page)
    {
        parent::__construct();
        $this->page = $page;
        $this->setDashboard('单页管理',route('admin.page'));
    }

    public function getIndex(){
        $this->setDashboard('新闻列表');
        $data = $this->page->getList();
        $this->setParams(compact('data'));
        return $this->setView('admin.page.index');
    }

    public function getEditor(Request $request){
        $this->setDashboard('单页编辑');
        $id = $request->input('id');
        $data = $this->page::find($id);
        $error_text = $request->input('error_text');
        $this->setParams(compact('data','error_text'));
        return $this->setView('admin.page.editor');
    }

    public function postStore(Request $request){
        $this->validate($request, [
            'name'   => 'required',
            'unique' => 'required',
        ],[
            'name.required'      =>  '名称不能为空！',
            'unique.required'    =>  '链接不能为空',
        ]);
        $post = $request->only('id','name','unique','extend','keyword','description','content');

        $check_unique = $this->page->getOneForUnique($post['unique']);

        if(!empty($check_unique['id']) && $check_unique['id'] != $post['id']){
            return redirect()->route('admin.page.editor',['id' => $post['id'],'error_text' => '链接已存在']);
        }

        $this->page->store($post);
        return redirect()->route('admin.page');
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $this->page->delete($id);
        return return_response('删除成功',200,['url' => url()->previous()]);
    }

}
