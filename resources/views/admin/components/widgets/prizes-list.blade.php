<div class="container-fluid app-list">
    <div class="col-xm-12 table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>商品名称</th>
                <th>商品编号</th>
                <th>奖品描述</th>
                <th>奖品规格</th>
                <th>抽奖/免费 概率%</th>
                <th>奖品来源</th>
                <th>兑换方式</th>
                <th class="col-sm-2">动作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($date as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->name }}</td>
                    <td>{{ $a->sn }}</td>
                    <td>{{ $a->description }}</td>
                    <td>{{ $a->specification }}</td>
                    <td>{{ $a->chance.' / '.$a->free_chance }}</td>
                    <td>{{ $a->source }}</td>
                    <td>{{ $a->exchange_type==1?'线上兑换':'线下兑换' }}</td>
                    <td>
                        <a role="button" class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#spiderweb-editor" data-load-url="{{ route('activityprize.editor', $a->id) }}"> <i class="fa fa-pencil"></i> 编辑 </a>
                        <a role="button" data-id="{{$a->id}}"  class="btn btn-warning btn-xs delete_prize" href="javascript:void(0);" data-toggle="modal" > 删除商品 </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>