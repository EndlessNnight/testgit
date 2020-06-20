
<div class="clearfix"></div>
@set($definition, \App\Presenters\IntegralPresenter::getDefinition($type))
<p class="lead text-primary">目前任务 {{ $data->count() }} 条 </p>
<div class="table-responsive">
    <table class="table table-striped" id="-table">
        <thead class="thead-default">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>任务描述</th>
            <th>任务模式</th>
            <th>任务模块</th>
            <th>任务类型</th>
            <th>任务状态</th>
            <th>提交时间</th>
            <th style="width: 240px;">动作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $b)
            <tr>
                <td></td>
                <td>{{$b->id }}</td>
                <td>{{$b->task_describe }}</td>
                <td>{{\App\Presenters\IntegralPresenter::getPatter($b->task_patter)}}</td>
                <td>{{\App\Presenters\IntegralPresenter::getModular($b->task_modular)}}</td>
                <td>{{$b->type->task_type_name}}</td>
                <td>{{\App\Presenters\IntegralPresenter::getStatue($b->task_statue)}}</td>
                <td>{{$b->updated_at}}</td>
                <td>
                    @foreach($definition->actions as $key => $action)
                        @if (empty($action->status) || in_array($b->task_statue, $action->status))
                            @if (isset($action->modals))
                                <a role="button" class="btn btn-sm {{ $action->class }}" href="#" data-toggle="modal"
                                   data-target="{{ $action->modals }}"
                                   data-load-url="{{ route($action->route, $b->id) }}">
                                    @elseif(isset($action->modal))
                                        <a role="button" class="btn btn-sm {{ $action->class }}" href="#" data-toggle="modal"
                                           data-target="{{ $action->modal }}"
                                           data-action="{{ route($action->route, $b->id) }}">
                                            @endif
                                            @else
                                                <a role="button" class="btn btn-sm btn-default disable" disabled>
                                                    @endif
                                                    <i class="{{ $action->icon }}"></i> {{ $action->text }}
                                                </a>
                                @endforeach

                </td>
            </tr>

        @endforeach()
        </tbody>
    </table>
    <div class="modal-footer">
        {{ $data->fragment($type)->links() }}
    </div>




</div>


