<div class="row">
    <div class="col-xs-12">
        <div class="box box-t3">
            @if(isset($title))
                <div class="box-header">
                    <h3 class="box-title">{{ $title }}</h3>
                </div>
        @endif
        <!-- /.box-header -->
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row" style="padding: 5px 20px;">
                        <form action="{{route('admin.contribute')}}">
                        <div id="example1_filter" class="dataTables_filter">
                            <label>搜索: <input type="search" name="search" class="form-control input-sm" placeholder="稿件编号|姓名|手机号码" style="padding: 16px 5px;" value="{{isset($search)?$search:''}}"></label>
                            <select id="status" name="status" class="form-control select1-input" style="width: 120px;">
                                <option value="" @if(empty($status)) selected @endif >全部状态</option>
                                @foreach(\App\Models\Contribute::STATUS_ARRAY as $v => $name)
                                    <option value="{{$v}}" @if(isset($status) && $v == $status)  selected @endif>{{$name}}</option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-block btn-primary btn-flat" style="width: 80px; display: inline-block">筛选</button>
                        </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">

                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th width="120">编号</th>
                                        <th width="120">刊物</th>
                                        <th width="80">姓名</th>
                                        <th width="160">文章题目</th>
                                        <th width="100">电话|手机</th>
                                        <th width="100">邮箱</th>
                                        {{--<th width="140">地址</th>--}}
                                        <th width="80" >QQ</th>
                                        {{--<th width="60">文件</th>--}}
                                        <th width="100">见刊时间</th>
                                        <th width="120">投稿时间</th>
                                        <th >备注信息</th>
                                        {{--<th width="120">等级</th>--}}
                                        {{--<th width="120" >类别</th>--}}
                                        <th width="120">稿件状态</th>
                                        <th class="sorting" width="200">动作</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                @if(count($show_data) > 0)
                                    @foreach($show_data as $item)
                                        <tr role="row" class="odd">
                                            <td >{{$item['identifier']}}</td>
                                            <td >@if(!empty($item->periodical)) {{$item->periodical->name}} @else -- @endif</td>
                                            <td >{{$item['name']}}</td>
                                            <td >{{$item['article_title']}}</td>
                                            <td >{{$item['phone']}} {{$item['tel']}}</td>
                                            <td >{{$item['email']}}</td>
                                            {{--<td >{{$item['address']}}</td>--}}
                                            <td >{{$item['QQ']}}</td>
                                            {{--<td >{{$item['file']}}</td>--}}
                                            <td >{{$item['expect_time']}}</td>
                                            <td >{{$item['created_at']}}</td>
                                            <td ><div style="max-height: 40px; overflow: hidden">{{$item['comment']}}</div></td>
                                            <td class="status_{{$item['status']}}">{{\App\Models\Contribute::STATUS_ARRAY[$item['status']]}}</td>
                                            {{--<td >{{$item['level']}}</td>--}}
                                            {{--<td >{{$item['type_id']}}</td>--}}
                                            <td>
                                                <a href="#" data-backdrop="static" data-load-url="{{ route('admin.contribute.editor',['id' => $item['id']]) }}" data-toggle="modal" data-target="#employ-editor" class="btn btn-xs delete btn-primary">编辑</a>
                                                <a href="#"  data-toggle="modal" data-target="#modal-delete" data-action="{{ route('admin.contribute.delete',['id' => $item['id']]) }}" class="btn btn-xs btn-warning delete">删除</a>
                                                @if(!empty($item->file_info))
                                                    <a target="_blank" href="{{route('admin.contribute.download.file',['contribute_id' => $item['id']])}}" class="btn btn-xs btn-primary">获取文件</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr role="row" class="odd">
                                        <td align="center"  colspan="5">{{ $nulldata or '暂无数据' }}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            @include('admin.tables.pages',['pages' => $show_data->appends(['search' => $search,'status'=>$status])->links()])

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    @include('admin.components.editor-form.delete-modal')
</div>
