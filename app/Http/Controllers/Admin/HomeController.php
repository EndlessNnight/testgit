<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\ContributeRepository;

class HomeController extends AdminController
{

    protected  $contribute;

    public function __construct(ContributeRepository $contribute)
    {
        parent::__construct();
        $this->contribute = $contribute;
        $this->setDashboard('网站首页',route('admin.employ'));
    }

    public  function getIndex(){
        $top_title = '稿件信息';
        $start_time = date('2019-01-01 00:00:00');
        $data['today'] = $this->contribute->getCountForTime(date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59'));
        $data['yesterday'] = $this->contribute->getCountForTime(date('Y-m-d 00:00:00',strtotime('-1 day')),date('Y-m-d 23:59:59',strtotime('-1 day')));
        $data['week'] = $this->contribute->getCountForTime(date('Y-m-d', (time() - ((date('w') == 0 ? 7 : date('w')) - 1) * 24 * 3600)),date('Y-m-d H:i:s'));
        $data['month'] = $this->contribute->getCountForTime(date('Y-m-d', strtotime(date('Y-m', time()) . '-01 00:00:00')),date('Y-m-d H:i:s'));

        $data['all'] = $this->contribute->getCountForTime($start_time,date('Y-m-d H:i:s'));
        $data['all_status_1'] = $this->contribute->getCountForTime($start_time,date('Y-m-d H:i:s'),'1');
        $data['all_status_0'] = $this->contribute->getCountForTime($start_time,date('Y-m-d H:i:s'),'0');

        $this->setParams(compact('data','top_title'));
        return $this->setView('admin.home');
    }

}
