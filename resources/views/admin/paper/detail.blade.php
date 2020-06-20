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
                        <form action="{{route('admin.paper')}}">
                            <div id="example1_filter" class="dataTables_filter">
                                <label>搜索: <input type="search" name="search" class="form-control input-sm" placeholder="论文名称" style="padding: 16px 5px;" value="{{isset($search)?$search:''}}"></label>
                                <select id="search_type" name="search_type" class="form-control select1-input" style="width: 120px;">
                                    <option value="" @if(empty($search_type)) selected @endif >全部分类</option>
                                    @if(isset($typeList))
                                        @foreach($typeList as  $v => $type_item)
                                            <option value="{{$type_item['id']}}" @if(isset($search_type) && $type_item['id'] == $search_type)  selected @endif>{{$type_item['name']}}</option>
                                        @endforeach
                                    @endif
                                </select>

                                <button type="submit" class="btn btn-block btn-primary btn-flat" style="width: 80px; display: inline-block">筛选</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">

                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                @if(!empty($heads) && is_array($heads))
                                    <thead>
                                    <tr role="row">
                                        <th width="120">论文标题</th>
                                        <th width="120">浏览次数</th>
                                        <th width="60">推荐</th>
                                        <th width="120">论文类型</th>
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
                                            <td width="60">{{ $item['recommend']==1?'是':'否'}}</td>
                                            <td width="120">{{ $typeList[$item['type']]['name']}}【{{ $typeList[$typeList[$item['type']]['pid']]['name']}}】</td>
                                            <td width="120">{{ $item['release_time']}}</td>
                                            <td width="220">{{ $item['keyword']}}</td>
                                            {{--<td >{{ $item['description']}}</td>--}}
                                            <td width="120">
                                                <a href="{{ route('admin.paper.editor',['id' => $item['id']]) }}"  class="btn btn-xs delete btn-primary">编辑</a>
                                                <a href="#"  data-toggle="modal" data-target="#modal-delete" data-action="{{ route('admin.paper.delete',['id' => $item['id']]) }}" class="btn btn-xs btn-warning delete">删除</a>
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