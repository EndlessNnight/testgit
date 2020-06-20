<div class="container-fluid block-list">
    <div class="col-xm-12 table-responsive">
        <table class="table table-striped" id="{{$type}}-table">
            <thead>
            <tr>
                <th>#</th>
                <th>序号</th>
                <th>活动名称</th>
                <th>活动时间</th>
                <th>跳转类型</th>
                <th class="col-sm-2">动作</th>
            </tr>
            </thead>
            <tbody class="">
            @foreach($data as $b)
                <tr data-id="{{$b->id}}">
                    <td>#</td>
                    <td>{{ $b->display_order }}</td>
                    <td>{{ $b->discount_name }}</td>
                    <td>{{ $b->start_time ." 至 " .$b->end_time }}</td>
                    <td>{{ $b->discount_url }}</td>
                    <td>
                        @if($type == 'audited-list')
                            <a role="button" class="btn btn-primary btn-xs" href="#" data-toggle="modal"
                               data-target="#spiderweb-editor" data-load-url="{{ route('discount.editor', $b->id) }}">
                                <i class="fa fa-pencil"></i>编辑 </a>
                        @else
                            <a role="button" class="btn btn-primary btn-xs" href="#" data-toggle="modal"
                               data-target="#spiderweb-editor" data-load-url="{{ route('discount.editor', $b->id) }}">
                                <i class="fa fa-pencil"></i> 查看 </a>
                        @endif
                        <a role="button" class="btn btn-danger btn-xs" href="#" data-toggle="modal"
                           data-target="#modal-delete" data-action="{{ route('discount.delete',$b->id) }}">
                            <i class="fa fa-trash-o"></i> 删除
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>

</div>




