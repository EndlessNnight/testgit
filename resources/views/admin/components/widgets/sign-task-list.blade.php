<div class="container-fluid app-list">
    <div class="col-xm-12 table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>任务名称</th>
                <th>任务天数</th>
                <th>任务奖品</th>
                <th>开始时间</th>
                <th>结束时间</th>


                <th class="col-sm-2">动作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($date as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->task_name }}</td>
                    <td>{{ $a->task_day }}</td>
                    <td>{{ $a->prize->name}}</td>
                    <td>{{ $a->start_time }}</td>
                    <td>{{ $a->end_time }}</td>
                    <td>
                    <a role="button" class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#sign-editor" data-load-url="{{ route('sign.editor', $a->id) }}"> <i class="fa fa-pencil"></i> 编辑 </a>
                        <a role="button" data-id="{{$a->id}}"  class="btn btn-warning btn-xs delete_sign_prize" href="javascript:void(0);" data-toggle="modal" > 删除商品 </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div id="sign-editor" class="modal modal-editor fade" data-backdrop="static" data-keyboard="false"
     data-editor-url="{{ route('sign.editor', 0) }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @include('activityprizes.sign-editor')
        </div>
    </div>
</div>