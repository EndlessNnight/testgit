<div class="container-fluid app-list">
    <div class="col-xm-12 table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>订单编号</th>
                <th>服务商</th>
                <th>金额</th>
                <th>下单时间</th>
                <th>状态</th>
                <th class="col-sm-2">动作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($modelList as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->order_sn }}</td>
                    <td>{{ $a->business_sn }}</td>
                    <td>{{ $a->price/100 }}</td>
                    <td>{{ $a->created_at }}</td>
                    <td>{{ \App\Models\Orders::$statusArr[$a->status] }}</td>
                    <td>
                        <a role="button" class="btn btn-primary" href="{{ route('orders.view', $a->id) }}"><i class="fa fa-eye"></i> 查看
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $modelList->appends(['order_active'=>'active'])->links() }}
    </div>
</div>