<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Admin\Config;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $config;
    function __construct()
    {

        $config = Config::get()->toArray();
        $config = array_combine(array_column($config,'identify'),array_column($config,'content'));
        $this->config = $config;
        view()->share(compact('config'));

        $topDoMain = get_domain();
        switch ($topDoMain){
            case 'shtm99.com';
                $topDoMain = 'hjlww.com';
                break;
            case 'sxmymt.top';
                $topDoMain = 'hjlww.com';
                break;
	    default;
		$topDoMain = "hjlww.com";
		break;
        }

        if($_SERVER['HTTP_HOST'] == 'm.ovoice.cn'){
            $topDoMain = 'm.ovoice.cn';
        }

        $configView = \config('view');

        view()->share([
            'sq' => $configView[$topDoMain]['sq']??'',
            'tj' => $configView[$topDoMain]['tj']??'',
        ]);
    }
}
