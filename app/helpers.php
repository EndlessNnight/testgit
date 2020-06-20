<?php

use Illuminate\Support\Arr;

/**
 * api 请求成功时返回信息  Dong 2018-06-08
 */
if(!function_exists('return_response')){
    function return_response($mes="请求成功",$code=200,$res=[]){
        if(!isset($res['code'])) $res = array_merge(['code' => $code],$res);
        if(!isset($res['msg']))  $res = array_merge(['msg' => $mes],$res);
        if(!isset($res['data'])) $res['data']=null;
        if(!isset($res['time'])) $res['time']=date("Y-m-d",time());
        return response()->json($res);
    }
}



/**
 * 日志调试
 * 将要调试的data以文件格式输出到根目录log.log下
 * @author Dong 2018-01-05
 * @param array|string $log  要输出的变量
 * @param string $logSign 自定义LOG标签
 * @param string $filename log文件地址 默认根目录下log.log
 * @return
 */
if (! function_exists('DLOG')) {
    function DLOG($log, $logSign='', $filename = '../log.log') {
        if(is_array($log)) $log = var_export($log, true);
        $log = "----------------- ".$logSign." log start ". date("Y-m-d H:i:s",time()) ."------------------------- \r\n" . $log ."\r\n";
        $log .= "----------------- log end -------------------------";
        file_put_contents($filename, $log . "\r\n", FILE_APPEND);
    }
}


if (! function_exists('php_data_key')) {
    function php_data_key($laravel_data_key)
    {
        if (empty($laravel_data_key)) {
            return null;
        }
        $keys = explode('.', $laravel_data_key);
        if (count($keys) == 1) {
            return $laravel_data_key;
        }

        return $keys[0] . implode('', array_map(function($key) { return "[$key]"; }, array_slice($keys, 1)));
    }
}

if (! function_exists('editing')) {
    function editing($key = null, $default = null)
    {
        $model = app('request')->_editing_model;
        if (!isset($model)) {
            return $default;
        }
        return data_get($model, $key, $default);
    }
}

if (! function_exists('exist_input')) {
    function exist_input($key, $default = null) {
        return old($key, editing($key, $default));
    }
}



if (! function_exists('editor')) {
    function editor($view, $data = [], $mergeData = [])
    {
        $model = Arr::pull($data, 'model');
        app('request')->_editing_model = $model;
        return view($view, $data, $mergeData);
    }
}

//获取顶级域名
if (! function_exists('get_domain')) {
    function get_domain()
    {

        $host = $_SERVER['HTTP_HOST'];

        $host = strtolower($host);

        if (strpos($host, '/') !== false) {

            $parse = @parse_url($host);

            $host = $parse['host'];
        }

        $topleveldomaindb = array('com', 'edu', 'gov', 'int', 'mil', 'net', 'org', 'biz', 'info', 'pro', 'name', 'museum', 'coop', 'aero', 'xxx', 'idv', 'mobi', 'cc', 'me');
        $str = '';

        foreach ($topleveldomaindb as $v) {

            $str .= ($str ? '|' : '') . $v;

        }


        $matchstr = "[^\.]+\.(?:(" . $str . ")|\w{2}|((" . $str . ")\.\w{2}))$";

        if (preg_match("/" . $matchstr . "/ies", $host, $matchs)) {

            $domain = $matchs['0'];

        } else {

            $domain = $host;

        }

        return $domain;

    }
}

?>
