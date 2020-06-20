<div class="row">
    <div class="col-xs-12">
        <div class="box  box-t3">
        @if(isset($title))
            <div class="box-header">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
        @endif

        <!-- /.box-header -->
            <div class="box-body " >
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table  class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting" >上级分类</th>
                                        <th class="sorting">分类名称</th>
                                        <th width="200" class="sorting" >排序</th>
                                        <th class="sorting">动作</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                @if(count($data) > 0)
                                    @foreach($data as $item)
                                        <tr role="row" class="odd" >
                                            <td> -- </td>
                                            <td>{{ $item['name'] }}</td>
                                            <td width="200">{{ $item['reorder'] }}</td>
                                            <td>
                                                <a href="#" data-backdrop="static" data-load-url="{{ route('admin.periodical.typeEditor',['id' => $item['id']]) }}" data-toggle="modal" data-target="#type-editor" class="btn btn-xs delete btn-primary">编辑</a>
                                                <a href="#"  data-toggle="modal" data-target="#modal-delete" data-action="{{ route('admin.periodical.typeDelete',['id' => $item['id']]) }}" class="btn btn-xs btn-warning delete">删除</a>
                                            </td>
                                        </tr>
                                        @if(!empty($item['list']))
                                            {{--<tr role="row" class="odd">--}}
                                                {{--<td colspan="3">--}}
                                                    {{--<table  class="table table-bordered table-hover dataTable" style="margin-left: 20px; margin-bottom: 0;border: 1px #ff6600 solid">--}}
                                                        @foreach($item['list'] as $list)
                                                            <tr role="row" class="odd" >
                                                                <td style="color: #888888">{{ $item['name'] }}</td>
                                                                <td style="color: #888888">{{ $list['name'] }}</td>
                                                                <td style="color: #888888">{{ $list['reorder'] }}</td>
                                                                <td>
                                                                    <a href="#" data-backdrop="static" data-load-url="{{ route('admin.periodical.typeEditor',['id' => $list['id']]) }}" data-toggle="modal" data-target="#type-editor" class="btn btn-xs delete btn-primary">编辑</a>
                                                                    <a href="#"  data-toggle="modal" data-target="#modal-delete" data-action="{{ route('admin.periodical.typeDelete',['id' => $list['id']]) }}" class="btn btn-xs btn-warning delete">删除</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    {{--</table>--}}
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                        @endif
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

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    @include('admin.components.editor-form.delete-modal')
</div>
