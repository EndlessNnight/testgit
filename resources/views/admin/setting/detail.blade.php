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
                                @if(!empty($heads) && is_array($heads))
                                    <thead>
                                    <tr role="row">
                                        @foreach($heads as $head)
                                            <th class="sorting" tabindex="0" >{{ $head }}</th>
                                        @endforeach
                                        <th class="sorting">动作</th>
                                    </tr>
                                    </thead>
                                @endif

                                <tbody>
                                @if(!empty($show_data))
                                    @foreach($show_data as $item)
                                        <tr role="row" class="odd">
                                            @foreach($heads as $key => $key_name)
                                                <td>{{ $item[$key] }}</td>
                                            @endforeach
                                            <td>
                                                <a href="#" data-backdrop="static"  data-toggle="modal" data-target="#setting-editor"
                                                   data-load-url="{{ route('admin.setting.update', $item->id) }}" class="btn btn-xs btn-primary" style="margin: 0 20px;">编辑</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    {{ $nulldata or '暂无数据' }}
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

</div>
