@include('components.widgets.news-list-filter')
<div class="clearfix"></div>
<p class="lead text-primary">目前推送 0 条 </p>
<div class="table-responsive">
    <table class="table table-striped" id="-table">
        <thead class="thead-default">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>消息名称</th>
            <th>创建时间</th>
            <th>推送方式</th>
            <th>消息类型</th>
            <th>消息状态</th>
            <th style="width: 240px;">动作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $b)
            <tr>
                <td></td>
                <td>{{$b->id }}</td>
                <td>{{$b->title }}</td>
                <td>{{$b->created_at}}</td>
                <td>{{\App\Presenters\NewsPresenter::push_mode($b->push_mode)}}</td>
                <td>{{\App\Presenters\NewsPresenter::push_ad($b->msg_type)}}</td>
                @if($b->news_state == 1)
                    <td>等待发送</td>
                @else
                    <td>发送成功</td>
                @endif
                <td class="col-sm-2">
                    <a role="button" class="btn btn-info btn-sm" href="{{ route("news.details" , $b->id) }}">
                        <i class="fa fa-share-square-o"></i> 查看
                    </a>
                    <a role="button" class="btn btn-primary btn-sm"
                       href="{{ route('news.editor' , $b->id) }}" {{--data-toggle="modal" data-target="#news-editor" data-load-url=""--}}>
                        <i class="fa fa-pencil-square-o"></i> 编辑
                    </a>
                    <a role="button" class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                       data-target="#modal-delete" data-action="{{ route('news.delete',$b->id) }}">
                        <i class="fa fa-trash-o"></i> 删除
                    </a>
                    <a role="button" class="btn btn-info btn-sm" href="#" data-toggle="modal"
                       data-target="#news-send"
                       data-load-url="{{ route('news.send' ,$b->id) }}">
                        <i class="fa fa-send"></i> 发送
                    </a>
                    <span class="arrange-icon"><i class="fa fa-bars"></i> </span>
                </td>
            </tr>

        @endforeach()
        </tbody>
    </table>
    <div class="modal-footer">

        {!! $news->links() !!}

    </div>


    @component('components.form.confirm', ['id' => 'modal-delete', ])
        <span>删除后无法恢复，确认删除吗？</span>
    @endcomponent
</div>
<div id="news-send" class="modal fade" data-backdrop="static" data-editor-url="" data-keyboard="true" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 888px">
            @include('news.news-send')
        </div>
    </div>
</div>


