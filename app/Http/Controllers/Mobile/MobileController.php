<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/31
 * Time: 13:17
 */

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Admin\Page;
use App\Models\Admin\Paper;
use App\Models\Admin\Periodical;
use App\Models\Admin\PeriodicalType;
use App\Models\Contribute;
use App\Models\File;
use App\Repositories\EmployRepository;
use App\Repositories\PaperRepository;
use App\Repositories\PeriodicalRepository;
use App\Repositories\PeriodicalTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MobileController extends Controller
{

    protected $type;

    protected $periodical;

    protected $paper;


    public function __construct(PeriodicalTypeRepository $type, PeriodicalRepository $periodical,PaperRepository $paper)
    {
        parent::__construct();
        $this->type = $type;
        $this->periodical = $periodical;
        $this->paper = $paper;

        $topType = $this->type->getListForLevel(1);
        view()->share(compact('topType'));
    }

    public function index(){
        $papers = $this->paper->getListForNumber(8);
        $recommend = $this->periodical->getOneRecommend(\App\Models\Admin\Periodical::RECOMMEND_HOME_FLASH);
        return view('mobile.index',compact('topType','recommend','papers'));
    }


    public function periodicalList(Request $request){
        $type = $request->input('top_type');
        $typeInfo = null;
        if(!empty($type)){
            $typeInfo = PeriodicalType::find($type);
        }
        $periodical = $this->periodical->getList('',$type);
        return view('mobile.periodical',compact('periodical','typeInfo'));
    }

    public function periodicalContent($unique){
        $perContent = $this->periodical->getOneForUnique($unique);

        $employ = new EmployRepository();
        $employ_arr = explode(',',$perContent->employ_web);
        $employData = $employ->getCheckList();
        $perContent->employ_web_text = '';

        foreach ($employ_arr as $k => $v){
            $perContent->employ_web_text .= $employData[$v].'</br>';
        }

        $title = $perContent->type->topType->name;
        return view('mobile.periodical-content',compact('title','perContent'));
    }

    public function page($unique){
        $pageContent = Page::where('unique',$unique)->first();
        return view('mobile.page',compact('pageContent'));
    }


    public function paperList(Request $request){
        $type = $request->input('top_type');
        $typeInfo = null;
        if(!empty($type)){
            $typeInfo = PeriodicalType::find($type);
        }
        $papers = $this->paper->getList('',$type);
        return view('mobile.paper',compact('papers','typeInfo'));
    }

    public function paperContent($id){
        $data = $this->paper->getOne($id);
//        dd($data->paperType->topType);
        Paper::increment('browse',1);
        return view('mobile.paper-content',compact('data'));
    }

    public function preContribute(){
        return view('mobile.contribute2');
    }

    public function contributePost(Request $request){
        $post_data = $request->input();
        $file = $request->file('file');
        $ip = $request->getClientIp();
        $fileInfo = null;
        if(!empty($file)){
            $store_path = 'files/'.date('Ymd');

            $size = $file->getSize();
            if($size/1024/1024 > $this->config['web_upload_max']){
                return $this->resJavascript("文件大小超限~");
            }

            $mime = $file->getMimeType();
            $file_name = $file->getClientOriginalName();
            $cache_arr = explode('.',$file_name);
            $extension = array_pop($cache_arr);

            $exten_array = ['txt','doc','docx','rar','zip'];
            if(!in_array($extension,$exten_array)){
                return $this->resJavascript("文件类型错误~");
            }

            $store_file_name  = md5(mt_rand(10000,99999).uniqid()).'.'.$extension;

            $path = $file->storeAs(
                $store_path, $store_file_name
            );

            $f = new File();
            $f->name = $file_name;
            $f->size =  $file->getSize();;
            $f->mime = $mime;
            $f->url  = '/uploads/'.$path;
            $f->ip   = $ip;
            $f->save();

            $return['file'] = $f->toArray();
            $fileInfo = $return;
        }

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
            return $this->resJavascript("提交信息过于频繁，请稍后再试~");
        }

        if(isset($post_data['name']) && $post_data['name'] == '请输入作者姓名') $post_data['name'] = '';
        if(isset($post_data['periodical_name']) && $post_data['periodical_name'] == '请输入投稿刊物') $post_data['periodical_name'] = '';
        if(isset($post_data['comment']) && $post_data['comment'] == '请描述下需求，方便老师帮您…') $post_data['comment'] = '';
        if(isset($post_data['discipline']) && $post_data['discipline'] == '请输入您的所学专业') $post_data['discipline'] = '';
        if(isset($post_data['QQ']) && $post_data['QQ'] == '请输入QQ') $post_data['QQ'] = '';

        $insert_data = [
            "name" => empty($post_data['name'])?'':$post_data['name'],
            "tel" => empty($post_data['tel'])?'':$post_data['tel'],
            "phone" => empty($post_data['phone'])?'':$post_data['phone'],
            "email" => empty($post_data['email'])?'':$post_data['email'],
            "address" => empty($post_data['address'])?'':$post_data['address'],
            "qq" => empty($post_data['qq'])?'':$post_data['qq'],
            "file" => empty($fileInfo['id'])?0:$fileInfo['id'],
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
            'periodical_name' => empty($post_data['periodical_name'])?'':$post_data['periodical_name'],
            'discipline' => empty($post_data['discipline'])?'':$post_data['discipline'],
            'educate' => empty($post_data['educate'])?'':$post_data['educate'],
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
            return $this->resJavascript("信息提交成功~");
        }catch (\Exception $e){
            DB::rollBack();
            Log::warning($e);
            return $this->resJavascript("信息提交失败，请稍后再试~");
        }

    }

    public function resJavascript($text){
        return "<script>alert('".$text."')</script>";
    }


}