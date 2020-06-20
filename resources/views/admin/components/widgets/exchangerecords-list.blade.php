<div class="panel-body solid">
    <form action="" class="form-inline pull-left">
        <div class="form-group ts_select_timespan">
            <label for="start_time" class="ts_select_from_label time-color">选择日期</label>
            <div class='input-group ts_select_from'>
                <input type='text' id="start_time" name="{{$type }}_start_time" class="form-control date datetimepicker"
                       value="{{ $exchange_start_time}}"/>
                <span class="input-group-addon">
                                          <i class="fa fa-clock-o"></i>
                                    </span>
            </div>
            <label for="end_time" class="ts_select_to_label time-color">至</label>
            <div class='input-group ts_select_to'>
                <input type='text' id="end_time" name="{{ $type }}_end_time" class="form-control date datetimepicker"
                       value="{{ $exchange_end_time }}"/>
                <span class="input-group-addon">
                                          <i class="fa fa-clock-o"></i>
                                     </span>
            </div>
            <label for="end_time" class="ts_select_to_label time-color"></label>
            <div class='input-group ts_select_to'>
                <input type='text' id="end_time" name="{{ $type }}_search" class="form-control "
                       value="{{ $exchange_search }}" placeholder="ID / 名字 / 手机号 / 地址..."/>
            </div>
        </div>
        <input type='hidden' id="end_time" name="exchang_active" class="form-control "
               value="active"/>
        <button type="submit" class="btn btn-primary pull-right"
                style="background-color: #2fa3d9;margin-left: 20px">筛选
        </button>
    </form>
    <a href="{{ route('orders.exchange.export',['start'=>$exchange_start_time,'end'=>$exchange_end_time,'search'=>$exchange_search]) }}"
       class="btn btn-primary pull-left"  style="background-color: #2fa3d9;margin-left: 20px">导出</a>

</div>
<div class="container-fluid app-list">
    <div class="col-xm-12 table-responsive">
        <table class="table"  id="myTable">
            <thead>
            <tr>
                <th>#</th>
                <th>用户ID</th>
                <th>用户名称</th>
                <th>用户手机</th>
                <th>用户地址</th>
                {{--<th>奖品id</th>--}}
                <th>奖品名称</th>
                <th>兑换数量</th>
                <th>兑换时间</th>
                <th>备注</th>
                <th>状态</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($exchangeRecordsList as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->device_id }}</td>
                    <td>{{ $a->user_name }}</td>
                    <td>{{ $a->user_phone }}</td>
                    <td>{{ $a->user_address }}</td>
                    {{--<td>{{ $a->prize_id }}</td>--}}
                    <td>{{ $a->ActivityPrize->name }}</td>
                    <td>{{ $a->prize_num }}</td>
                    <td>{{ $a->exchange_time }}</td>
                    <td>{{ $a->remarks }}</td>
                    <td data-status="{{$a->status}}" data-id="{{$a->id}}" class="btn  update_jilu {{$a->status==1?'btn-success':'btn-warning'}}">
                    {{ \App\Models\ExchangeRecords::$statusArr[$a->status] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <script src="{{ url('/assets/js/jquery.tablesorter.min.js') }}"></script>
    <script>
        $("#myTable").tablesorter();
        $(".update_jilu").click(function () {
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
    {{ $exchangeRecordsList->appends(['exchange_start_time' =>$exchange_start_time, 'exchange_end_time'=>$exchange_end_time ,'exchange_search'=>$exchange_search,'exchange_active'=>'active'])->links() }}
</div>
