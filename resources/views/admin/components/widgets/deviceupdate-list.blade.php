@include('components.widgets.deviceupdate-list-filter', ['provinces' => $provinces, 'operatorList'=>$operatorList, 'appList'=>$appList])
<div class="col-xm-12 table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>计划名称</th>
            <th>标识</th>
            <th>版本</th>
            <th>运营商</th>
            <th>地区</th>
            <th>创建时间</th>
            <th>状态</th>
            <th class="col-sm-2">动作</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $v)
            <tr>
                <td>{{ $v->rule_name }}</td>
                <td>{{ $v->app_id }}</td>
                <td>{{ $v->app_version }}</td>
                <td>{{ $v->operators }}</td>
                <td>{{ $v->province }}:{{$v->city}}</td>
                <td>{{ $v->created_at }}</td>
                <td>{{ \App\Models\AppsUpgradeRule::$statusArr[$v->status] }}</td>
                <td>
                    <a role="button" class="btn btn-info btn-sm"  href="#" data-toggle="modal" data-target="#upgraderule-detail" data-load-url="{{ route('upgraderule.view' , $v->id) }}">
                        <i class="fa fa-share-square-o"></i> 查看
                    </a>
                    <a role="button" class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-delete" data-action="{{ route('upgraderule.upstatus', ['id'=>$v->id,'status'=>-1, 'delete'=>1]) }}">
                        <i class="fa fa-pencil"></i>删除
                    </a>
                    <a role="button" class="btn btn-info btn-sm" href="{{ route('upgraderule.editor', ['id'=>$v->id]) }}" data-toggle="modal">
                        <i class="fa fa-share-square-o"></i>编辑
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!--分页-->
    {{ $data->links() }}
</div>