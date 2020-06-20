<div class="panel-body solid">
    <form action="" class="form-inline pull-left">
        <div class="form-group ts_select_timespan">
            <label for="start_time" class="ts_select_from_label time-color">选择日期</label>
            <div class='input-group ts_select_from'>
                <input type='text' id="start_time" name="{{$type }}_start_time" class="form-control date datetimepicker"
                       value="{{ $sign_start_time}}"/>
                <span class="input-group-addon">
                                          <i class="fa fa-clock-o"></i>
                                    </span>
            </div>
            <label for="end_time" class="ts_select_to_label time-color">至</label>
            <div class='input-group ts_select_to'>
                <input type='text' id="end_time" name="{{ $type }}_end_time" class="form-control date datetimepicker"
                       value="{{ $sign_end_time }}"/>
                <span class="input-group-addon">
                                          <i class="fa fa-clock-o"></i>
                                     </span>
            </div>
            <label for="end_time" class="ts_select_to_label time-color"></label>
            <div class='input-group ts_select_to'>
                <input type='text' id="end_time" name="{{ $type }}_search" class="form-control "
                       value="{{ $sign_search }}" placeholder="ID"/>
            </div>
        </div>
        <input type='hidden' id="end_time" name="exchang_active" class="form-control "
               value="active"/>
        <button type="submit" class="btn btn-primary pull-right"
                style="background-color: #2fa3d9;margin-left: 20px">筛选
        </button>
    </form>
    {{--<a href="{{ route('orders.exchange.export',['start'=>$exchange_start_time,'end'=>$exchange_end_time,'search'=>$exchange_search]) }}"--}}
    {{--class="btn btn-primary pull-left"  style="background-color: #2fa3d9;margin-left: 20px">导出</a>--}}

</div>
<div class="container-fluid app-list">
    <div class="col-xm-12 table-responsive">
        <table class="table" id="myTable">
            <thead>
            <tr>
                <th>#</th>
                <th>用户ID</th>
                <th>任务名称</th>
                <th>任务奖品</th>
                <th>任务进度</th>
                {{--<th>任务结束时间</th>--}}
                <th>状态</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($SignPrizeList as $a)
                <tr>
                    <td>{{ $a->id or null}}</td>
                    <td>{{ $a->device_id or null}}</td>
                    <td>{{ $a->SignTask->task_name or null }}</td>
                    <td>{{ $a->SignTask->prize_name or null}}</td>
                    <td>
                        {{ $a->progress_days}} / {{ $a->SignTask->task_day}}
                    </td>
                    <td>{{ $a->SignTask->end_time }}</td>
                    @if($a->statue == 1)
                        <td class="btn btn-success">已完成</td>
                    @endif

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <script src="{{ url('/assets/js/jquery.tablesorter.min.js') }}"></script>
    <script>
        $("#myTable").tablesorter();
        $(".update").click(function () {
            if (window.confirm('确定修改状态吗?')) {
                var id = $(this).data('id');
                var status = $(this).data('status');
                var upstatus = status == 0 ? 1 : 0;
                var token = "{{ csrf_token()}}";
                $.post("{{route('orders.updateexchange')}}", {id: id, status: upstatus, _token: token},
                    function (data) {
                        window.location.reload();
                    });
            }
        });
    </script>
</div>
