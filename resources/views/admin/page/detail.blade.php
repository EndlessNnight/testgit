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
                    <div class="row">
                        <div class="col-sm-12">

                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th width="120">单页名称</th>
                                        <th width="120">单页链接</th>
                                        <th class="sorting">动作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($show_data) > 0)
                                    @foreach($show_data as $item)
                                        <tr role="row" class="odd">
                                            <td width="120">{{ $item['name']}}</td>
                                            <td width="120">{{ $item['unique']}}</td>
                                            <td width="120">
                                                <a href="{{ route('admin.page.editor',['id' => $item['id']]) }}"  class="btn btn-xs btn-primary">编辑</a>
                                                <a href="{{ route('home.info',['unique' => $item['unique']]) }}" target="_blank" class="btn btn-xs btn-success">查看</a>
                                                @if($item['isdel'] == 1)
                                                <a href="#"  data-toggle="modal" data-target="#modal-delete" data-action="{{ route('admin.page.delete',['id' => $item['id']]) }}" class="btn btn-xs btn-warning delete">删除</a>
                                                    @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr role="row" class="odd">
                                        <td align="center" colspan="6">{{ $nulldata or '暂无数据' }}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            @include('admin.tables.pages',['pages' => $show_data->links()])

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    @include('admin.components.editor-form.delete-modal')
</div>
