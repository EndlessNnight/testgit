<?php

namespace App\Http\Controllers\Front;

use App\Models\Admin\News;
use App\Models\Admin\Periodical;
use App\Models\Admin\PeriodicalFile;
use App\Models\Admin\PeriodicalType;
use App\Models\Contribute;
use App\Repositories\EmployRepository;
use App\Repositories\NewsRepository;
use App\Repositories\PageRepository;
use App\Repositories\PaperRepository;
use App\Repositories\PeriodicalRepository;
use App\Repositories\PeriodicalTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    protected $type;
    protected $periodical;
    protected $news;
    protected $paper;
    protected $class_list;
    protected $employ;
    protected $page;

    public function __construct(PeriodicalTypeRepository $type,PeriodicalRepository $periodical,NewsRepository $news,PaperRepository $paper,EmployRepository $employ,PageRepository $page)
    {
        parent::__construct();
        $this->type = $type;
        $this->periodical = $periodical;
        $this->news = $news;
        $this->paper = $paper;
        $this->employ = $employ;
        $this->page = $page;
        $this->class_list = $this->type->getLevelList();
        $pages = $page->getNavList();
        view()->share('class_list',$this->class_list);
        view()->share('pages',$pages);
    }

    public function home(){
        // 刊物列表
        $periodical_data = $this->periodical->getHomeList(9);
        $periodical_list = [];
        foreach ($periodical_data as $key => $val){
            $val = (array)$val;
            $periodical_list[$val['tid']][] = $val;
        }
        $class = $this->class_list;
        foreach ($class as $k => $v){
            if(empty($periodical_list[$v['id']])){
                unset($class[$k]);
            }
        }
        $class_list_group = array_chunk(array_filter($class), 3, true);

        // 期刊资讯
        $news_list = $this->news->getListFormNum(News::POSITION_HOME_REPORT,8);
        $news_type = $this->news->getTypeList();
        $news_type = array_combine(array_column($news_type,'id'),array_column($news_type,'name'));

        // 论文列表
        $paper_data = $this->paper->getHomeList(8);
        $paper_list = [];
        foreach ($paper_data as $key => $val){
            $val = (array)$val;
            $paper_list[$val['tid']][] = $val;
        }

        //推荐期刊
        $recommend_periodical = $this->periodical->getRecommend();
        if(!empty($recommend_periodical[\App\Models\Admin\Periodical::RECOMMEND_HOME_FLASH])){
            $recommend_flash = array_values($recommend_periodical[\App\Models\Admin\Periodical::RECOMMEND_HOME_FLASH]);
            $recommend_flash = array_map(function ($item){
                $item['url'] = route('home.periodical.content',['unique' => $item['unique']]);
                $item['name'] = $item['name'].'杂志社';
                return $item;
            },$recommend_flash);
        }
        $recommend_periodical['flash'] = [];
        if(!empty($recommend_flash)){
            foreach (['img_url','url','name'] as $v){
                $recommend_periodical['flash'][$v] = implode('|',array_column($recommend_flash,$v));
            }
        }
        return view('front/index',
            compact('periodical_list','class_list_group','news_list','news_type','paper_list','recommend_periodical'));
    }

    public function periodical(Request $request){
        $type_id = $request->input('type_id');
        $type_info = null;
        if(!empty($type_id)){
            $type_info = $this->type->find($type_id);
        }
        $search = $request->input('search');
        if(!empty($search)){
            $search_title = '期刊查询';
            $periodical_data = $this->periodical->getListForWhere($search);
        }else{
            $periodical_data = $this->periodical->getListForType($type_id);
        }
        if(!empty($periodical_data)){
            //收录列表
            $employData = $this->employ->getCheckList('short_name');
            foreach ($periodical_data as $key => $val){
                if(empty($val->employ_web)) {
                    $periodical_data[$key]->employ_web = [];
                    $periodical_data[$key]->employ_web_text = '';
                }else{
                    $periodical_data[$key]->employ_web = explode(',',$val->employ_web);
                    $periodical_data[$key]->employ_web_text = '';
                    $periodical_data[$key]->employ_web_text = implode('、',$employData);
                }
            }
            $periodical_array = array_chunk($periodical_data->toArray()['data'], 2, true);
        }else{
            $periodical_data = [];
        }
        $periodical_data->appends(
            ['type_id' => isset($type_id)?$type_id:0,'search' => isset($search)?$search:'']
        );
        return view('front.per-list',compact('periodical_data','type_info','periodical_array','search','search_title'));
    }


    public function news(Request $request){
        $type_id = $request->input('position');
        $data = $this->news->getListForType($type_id);
        $type = $this->news->getTypeList();
        $type = array_combine(array_column($type,'id'),$type);
        $type_name = isset($type[$type_id])?$type[$type_id]['name']:'所有资讯';
        if(!empty($type_id)) {
            $data->appends(
                ['type_id' => $type_id,]
            );
        }
        $url_name = 'home.paper.content';
        return view('front.news',compact('data','type','type_id','type_name','url_name'));
    }

    public function paper(Request $request){
        $show_type = 1;
        $type_id = $request->input('type_id');
        $this->getTypeInfoForTypeId($type_id);

        $data = $this->paper->getListForType($type_id);
        if(!empty($type_id)) {
            $data->appends(
                ['type_id' => $type_id,]
            );
        }
        $url_name = 'home.paper.content';
        return view('front.news',compact('data','news_type','type_id','show_type','url_name'));
    }

    public function paperContent(Request $request){
        $id = $request->input('id');
        $data = $this->paper->find($id);
        $this->paper->browseOnce($id);
        $type_info = $this->getTypeInfoForTypeId($data['type']);
        $title = empty($type_info->name)?$data['title']:$type_info->name.'论文';
        return view('front.paper-content',compact('data','title'));
    }

    private function getTypeInfoForTypeId($type_id,$default='全部论文'){
        $type_info = null;
        if(!empty($type_id)){
            $type_info = $this->type->find($type_id);
            if(!empty($type_info['pid'])){
                $type_name = $this->class_list[$type_info['pid']]['name'];
            }else{
                $type_name = $this->class_list[$type_info['id']]['name'];
            }
        }else{
            $type_name = $default;
        }
        view()->share('type_info',$type_info);
        view()->share('type_name',$type_name);
        return $type_info;
    }

    public function newsContent(Request $request){
        $id = $request->input('id');
        $data = $this->news->find($id);
        $type = $this->news->getTypeList();
        $this->news->browseOnce($id);
        $type = array_combine(array_column($type,'id'),$type);
        $title = isset($type[$data['type']])?$type[$data['type']]['name']:'资讯';
        return view('front.paper-content',compact('data','title'));
    }

    public function info($name){
        $data = $this->page->getOneForUnique($name);
        return view('front.info',compact('data'));
    }

    public function contribute(Request $request){
        $file_id = $request->input('file_id');
        $file_data = [];
        if(!empty($file_id) || $file_id != 'undefined'){
            $file_data = File::find($file_id);
        }
        return view('front.contribute',compact('file_data'));
    }

    public function perValidate(){
        return view('front.validate');
    }

    public function periodicalContent($unique){
        $type = 2;
        $type_info = $this->news->findType($type);
        $news_list = $this->news->getListForType($type,25);
        $this->getPeriodicalData($unique);
        return view('front.periodical.index',compact('news_list','type_info'));
    }

    public function periodicalIntroduction($unique){
        $this->getPeriodicalData($unique);
        return view('front.periodical.introduction');
    }

    public function periodicalInfo($unique,$page){
        $this->getPeriodicalData($unique);
        $page = $this->page->getOneForUnique($page);
        return view('front.periodical.page',compact('page'));
    }

    public function periodicalContribute($unique){
        $this->getPeriodicalData($unique);
        return view('front.periodical.contribute');
    }

    public function periodicalNews($unique,Request $request){
        $type = $request->input('news_type');
        if(empty($type)) $type = 2;
        $type_info = $this->news->findType($type);
        $news_list = $this->news->getListForType($type,25);
        $this->getPeriodicalData($unique);
        return view('front.periodical.news',compact('news_list','type_info'));
    }

    private function getSSBDData(Request $request,$unique){
        $type = $request->input('news_type');
        if(empty($type)) $type = 2;
        $type_info = $this->news->findType($type);
        $this->getPeriodicalData($unique);
        $news_list = $this->news->getListForType($type,25);
        view()->share(compact('news_list','type_info'));
    }

    public function periodicalNewsContent($unique,$news_id){
        $this->getPeriodicalData($unique);
        $news_content = $this->news->find($news_id);
        $this->news->browseOnce($news_id);
        return view('front.periodical.news-content',compact('news_content'));
    }

    public function periodicalPaper($unique){
        $this->getPeriodicalData($unique);
        $paper_list = $this->paper->getList('','',25);
        return view('front.periodical.paper',compact('paper_list'));
    }

    public function periodicalPaperContent($unique,$paper_id){
        $this->getPeriodicalData($unique);
        $paper_content = $this->paper->find($paper_id);
        $this->paper->browseOnce($paper_id);
        return view('front.periodical.paper-content',compact('paper_content'));
    }

    public function periodicalEmployQuery($unique,Request $request){
        $this->getPeriodicalData($unique);
        $search = $request->input('search');
        $content = Contribute::where('identifier',$search)->with('periodicalName')->first();
//        $this->paper->browseOnce($paper_id);
        return view('front.periodical.query',compact('content'));
    }

    public function employQuery(Request $request){
        $title = '稿件查询';
        $search = $request->input('search');
        $content = Contribute::where('identifier',$search)->with('periodicalName')->first();
        return view('front.query',compact('content','title'));
    }


    public function periodicalConcat($unique){
        $this->getPeriodicalData($unique);
        return view('front.periodical.concat');
    }

    public function periodicalEmployList($unique){
        $this->getPeriodicalData($unique);
        $contribute_list = Contribute::where('status',0)->orWhere('status',1)->orderBy('id','desc')->paginate(config('s.pag'));
        return view('front.periodical.employ-list',compact('contribute_list'));
    }

    private function getPeriodicalData($unique){
        $data = $this->periodical->getForUnique($unique);
        $news_list = $this->news->getListFormNum(News::POSITION_HOME_REPORT,8);
        $recommend_paper = $this->paper->getRecommend(4);
        $employData = $this->employ->getCheckList('name');
        $recommend_news = $this->news->getRecommendList();
        $data['employ_web_text'] = implode('<br>',$employData);
        $covers = PeriodicalFile::where('periodical_id',$data['id'])
            ->leftJoin('files','files.id','=','periodical_file.file_id')
            ->get()->toArray();
        $employ_list = Contribute::where('status',0)->orWhere('status',1)->orderBy('id','desc')->offset(0)->limit(50)->get()->toArray();
        view()->share(compact('data','news_list','recommend_paper','recommend_news','covers','employ_list'));
    }


    public function contributePost(Request $request){
        $ip = $request->getClientIp();

        $post_time = 60;
        $post_num = 120;
        try{
            $post_time = (int) $this->config['web_user_post_time'];
            if($post_time > 1440) $post_time = 60;
            if($post_time < 1) $post_time = 1;

            $post_num = (int) $this->config['web_user_post_num'];
            if($post_num > 100) $post_num = 100;
            if($post_num < 1) $post_num = 1;

        }catch (\Exception $e){
            Log::warning($e);
        }

        $select_time = date('Y-m-d H:i:s',time()-$post_time*60);
        $postCount = Contribute::where('ip',$ip)->where('created_at' ,'>=',$select_time)->count();
        if($postCount >= $post_num){
            return return_response("提交信息过于频繁，请稍后再试",500);
        }
        $post_data = $request->only('name','tel','phone','email','address','qq','file_id','expect_time','article_title','purpose','comment','level','type_id','periodical_id');
        $insert_data = [
            "name" => empty($post_data['name'])?'':$post_data['name'],
            "tel" => empty($post_data['tel'])?'':$post_data['tel'],
            "phone" => empty($post_data['phone'])?'':$post_data['phone'],
            "email" => empty($post_data['email'])?'':$post_data['email'],
            "address" => empty($post_data['address'])?'':$post_data['address'],
            "qq" => empty($post_data['qq'])?'':$post_data['qq'],
            "file" => empty($post_data['file_id'])?0:$post_data['file_id'],
            "expect_time" => empty($post_data['expect_time'])?'':$post_data['expect_time'],
            "article_title" => empty($post_data['article_title'])?'':$post_data['article_title'],
            "purpose" => empty($post_data['purpose'])?0:$post_data['purpose'],
            "comment" => empty($post_data['comment'])?'':$post_data['comment'],
            "level" => empty($post_data['level'])?Periodical::LEVEL_PROVINCIAL:$post_data['level'],
            "type_id" => empty($post_data['type_id'])?0:$post_data['type_id'],
            'ip'    =>  $ip,
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'periodical_id' => empty($post_data['periodical_id'])?'0':$post_data['periodical_id'],
        ];
        $insert_data['comment'] = mb_substr($insert_data['comment'],0,1000);
        $periodical_id = $request->input('periodical_id');
        if(!empty($periodical_id)){
            $periodical = Periodical::find($periodical_id);
            if(!empty($periodical)){
                $periodical_type = PeriodicalType::find($periodical['type_id'])->first();
                $insert_data['type_id'] = !empty($periodical['type_id'])?$periodical['type_id']:0;
                $insert_data['level'] = !empty($periodical_type['level'])?$periodical_type['level']:Periodical::LEVEL_PROVINCIAL;
            }
        }
        try{
            DB::beginTransaction();
            $insert_id = Contribute::insertGetId($insert_data);
            $identifier = 'tg'.date('Ymd').$num=str_pad($insert_id,5,"0",STR_PAD_LEFT);;
            Contribute::where('id',$insert_id)->update(['identifier' => $identifier]);
            DB::commit();
            return return_response("信息提交成功",200);
        }catch (\Exception $e){
            DB::rollBack();
            Log::warning($e);
            return return_response("信息提交失败，请稍后再试",501);
        }
    }

    public function filePost(Request $request){
        $fileInput = 'file';
        $ip = $request->getClientIp();
        $post_time = 60;
        $post_num = 120;
        try{
            $post_time = (int) $this->config['web_user_post_time'];
            if($post_time > 1440) $post_time = 60;
            if($post_time < 1) $post_time = 1;

            $post_num = (int) $this->config['web_user_post_num'];
            if($post_num > 100) $post_num = 100;
            if($post_num < 1) $post_num = 1;

        }catch (\Exception $e){
            Log::warning($e);
        }

        $select_time = date('Y-m-d H:i:s',time()-$post_time*60);
        $postCount = File::where('ip',$ip)->where('created_at' ,'>=',$select_time)->count();
        if($postCount >= $post_num){
            return return_response("文件上传过于频繁，请稍后再试！",500);
        }
        $upload_file = $request->file($fileInput);
        $store_path = 'files/'.date('Ymd');
        $size = $upload_file->getSize();

        if($size/1024/1024 > $this->config['web_upload_max']){
            return return_response("文件大小不得超过".$this->config['web_upload_max'],501);
        }

        $mime = $upload_file->getMimeType();
        $file_name = $upload_file->getClientOriginalName();
        $cache_arr = explode('.',$file_name);
        $extension = array_pop($cache_arr);

        $exten_array = ['txt','doc','docx','rar','zip'];
        if(!in_array($extension,$exten_array)){
            return return_response("文件类型错误！",502);
        }

        $store_file_name  = md5(mt_rand(10000,99999).uniqid()).'.'.$extension;

        $path = $request->file($fileInput)->storeAs(
            $store_path, $store_file_name
        );

        $f = new File;
        $f->name = $file_name;
        $f->size = $size;
        $f->mime = $mime;
        $f->url  = '/uploads/'.$path;
        $f->ip   = $ip;
        $f->save();

        $return['file'] = $f->toArray();
        return return_response("上传成功",200,$return);
    }


}
