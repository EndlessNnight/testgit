<div class="panel-body solid">
    <form class="form-inline pull-left">
        <div class="form-group ts_select_timespan">
            <label for="start_time" class="ts_select_from_label time-color">选择日期</label>
            <div class='input-group ts_select_from'>
                <input type='text' id="start_time" name="{{$type }}_start_time" class="form-control date datetimepicker"
                       value="{{ $prize_start_time}}"/>
                <span class="input-group-addon">
                                          <i class="fa fa-clock-o"></i>
                                    </span>
            </div>
            <label for="end_time" class="ts_select_to_label time-color">至</label>
            <div class='input-group ts_select_to'>
                <input type='text' id="end_time" name="{{ $type }}_end_time" class="form-control date datetimepicker"
                       value="{{ $prize_end_time }}"/>
                <span class="input-group-addon">
                                          <i class="fa fa-clock-o"></i>
                                     </span>
            </div>
            <label for="end_time" class="ts_select_to_label time-color">设备ID</label>
            <div class='input-group ts_select_to'>
                <input type='text' id="end_time" name="{{ $type }}_search" class="form-control "
                       value="{{ $prize_search }}" placeholder="搜索……"/>
            </div>
        </div>
        <input type='hidden' id="end_time" name="przie_active" class="form-control "
               value="active"/>
         <button type="submit" class="btn btn-primary pull-right"
               style="background-color: #2fa3d9;margin-left: 20px">筛选
        </button>

    </form>

</div>


<div class="table-responsive">
    <div class="col-xm-12 table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>设备id</th>
                <th>奖品名称</th>
                <th>奖品数量</th>
                <th>摇奖时间</th>
                <th>中奖来源</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($prizesList as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->device_id }}</td>
                    <td>{{ $a->prize_name }}</td>
                    <td>{{ $a->prize_num }}</td>
                    <td>{{ $a->created_at }}</td>
                    @if($a->activity_id == 1)
                        <td>摇一摇</td>
                        @else
                        <td>签到</td>
                    @endif()
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    {{ $prizesList->appends(['przie_active'=>'active','prize_start_time' =>$prize_start_time, 'prize_end_time'=>$prize_end_time ,'prize_search'=>$prize_search])->links() }}

</div>