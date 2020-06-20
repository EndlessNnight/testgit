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
                    <form action="{{route('admin.news')}}">
                        <div id="example1_filter" class="dataTables_filter">
                            <label>搜索: <input type="search" name="search" class="form-control input-sm" placeholder="新闻标题" style="padding: 16px 5px;" value="{{isset($search)?$search:''}}"></label>
                            <select id="search_type" name="search_type" class="form-control select1-input" style="width: 120px;">
                                <option value="" @if(empty($search_type)) selected @endif >全部分类</option>
                                @if(isset($news_type))
                                    @foreach($news_type as  $v => $type_name)
                                        <option value="{{$v}}" @if(isset($search_type) && $v == $search_type)  selected @endif>{{$type_name}}</option>
                                    @endforeach
                                @endif
                            </select>

                            <button type="submit" class="btn btn-block btn-primary btn-flat" style="width: 80px; display: inline-block">筛选</button>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-12">

                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                @if(!empty($heads) && is_array($heads))
                                    <thead>
                                    <tr role="row">
                                        <th width="120">新闻标题</th>
                                        <th width="120">浏览量</th>
                                        <th width="120">新闻类型</th>
                                        <th width="120">发布时间</th>
                                        <th width="220">关键词</th>
                                        {{--<th width="220">简介</th>--}}
                                        <th class="sorting">动作</th>
                                    </tr>
                                    </thead>
                                @endif
                                <tbody>
                                @if(count($show_data) > 0)
                                    @foreach($show_data as $item)
                                        <tr role="row" class="odd">
                                            <td width="120">{{ $item['title']}}</td>
                                            <td width="120">{{ $item['browse']}}</td>
                                            <td width="120">{{ $news_type[$item['type']]}}</td>
                                            <td width="120">{{ $item['release_time']}}</td>
                                            <td width="220">{{ $item['keyword']}}</td>
                                            {{--<td >{{ $item['description']}}</td>--}}
                                            <td width="120">
                                                <a href="{{ route('admin.news.editor',['id' => $item['id']]) }}"  class="btn btn-xs delete btn-primary">编辑</a>
                                                <a href="#"  data-toggle="modal" data-target="#modal-delete" data-action="{{ route('admin.news.delete',['id' => $item['id']]) }}" class="btn btn-xs btn-warning delete">删除</a>
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
            @include('admin.tables.pages',['pages' => $show_data->appends(['search' => $search,'search_type'=>$search_type])->links()])

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    @include('admin.components.editor-form.delete-modal')
</div>
