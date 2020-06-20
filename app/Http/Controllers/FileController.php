<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Services\OSS;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{

    public function postUpload(Request $request,$type){
        $fileInput = 'fileData';
        if ($request->hasFile($fileInput) && $request->file($fileInput)->isValid()) {
            $upload_file = $request->file($fileInput);
//            $temp_path = $request->$fileInput->path($fileInput);
            $file_name = $upload_file->getClientOriginalName();
            $cache_arr = explode('.',$file_name);
            $extension = array_pop($cache_arr);
            $size = $upload_file->getSize();
            $mime_type = $upload_file->getMimeType();
            $store_path = $this->getImgUploadsPath($type);

            $store_file_name  = md5(mt_rand(10000,99999).uniqid()).'.'.$extension;
//            $ossFilePath = $store_path.'/'.$store_file_name;

            $path = $request->file($fileInput)->storeAs($store_path,$store_file_name);

            $f = new File;
            $f->name = $file_name;
            $f->size = $size;
            $f->mime = $mime_type;
            $f->url  = '/uploads/'.$path;
            $f->save();
            $return['file'] = $f->toArray();
            return return_response("图片上传成功",200,$return);

        }
        return return_response("上传失败！",500);
    }

    private function getImgUploadsPath($type){
        return $path = 'images/'.date('Ymd');
//        if($type == 'image'){
//            $path = 'images/'.date('Ymd');
//        }else{
//            $path = 'uploads/'.date('Ymd');
//        }
//        return $path;
    }

    private function fileToOss($temp_path,$ossFilePath,$file_name,$size,$mime_type){
        $oss = new OSS;
        $res = $oss->serviceUploadToOSS($ossFilePath,$temp_path);

        return $res;

    }

}
