@set($definition, \App\Presenters\PromotionDefinition::getDefinition($type))

@include('components.widgets.promotion-list-filter')

<p class="lead text-primary">目前{{ $definition->title }} {{ $data->total() }} 个广告 </p>
<div class="table-responsive">
  <table class="table table-striped" id="{{$type}}-table">
    <thead class="thead-default">
    <tr>
      <th>#</th>
      <th>名称</th>
      <th>运营商</th>
      <th>地区</th>
      <th>位置</th>
      <th>广告周期</th>
      <th>提交时间</th>
      @if ($definition->hasColumn('status'))
        <th>状态</th>
      @endif
      @if ($definition->hasColumn('deploy_status'))
        <th>状态</th>
      @endif
      @if ($definition->hasColumn('last_audit_time'))
        <th>最后审核时间</th>
      @endif
      @if ($definition->hasColumn('last_audit_text'))
        <th>最后审核结果</th>
      @endif
      {{--@if ($definition->hasColumn('updated_at'))--}}
        {{--<th>{{ data_get($definition->columns, 'updated_at.label') }}</th>--}}
      {{--@endif--}}
      <th style="width: 240px;">动作</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($data as $p)
      <tr>
        <td>{{ $p->serial }}</td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->present()->operator_text }}</td>
        <td>{{ $p->present()->region_text }}</td>
        <td>
          @foreach ($p->banners as $b)
            {!! $b->present()->ad_space_label !!}
          @endforeach
        </td>
        <td>{{ $p->present()->timespan }}</td>
        <td>{{ $p->present()->created_at }}</td>
        @if ($definition->hasColumn('status'))
          <td>{{ $p->present()->last_status_text }}</td>
        @endif
        @if ($definition->hasColumn('deploy_status'))
          <td class="queue-duration" data-start-time="{{ $p->present()->start_time_text }}" data-end-time="{{ $p->present()->end_time_text }}"></td>
        @endif
        @if ($definition->hasColumn('last_audit_time'))
          <td>{{ $p->present()->last_audit_time }}</td>
        @endif
        @if ($definition->hasColumn('last_audit_text'))
          <td>{{ $p->present()->last_audit_text }}</td>
        @endif
        {{--@if ($definition->hasColumn('updated_at'))--}}
          {{--<td>{{ $p->updated_at }}</td>--}}
        {{--@endif--}}
        <td>
          @foreach($definition->actions as $key => $action)
            @if (empty($action->status) || in_array($p->last_status, $action->status))
              @if (isset($action->modal))
                <a role="button" class="btn btn-sm {{ $action->class }}" href="#" data-toggle="modal" data-target="{{ $action->modal }}" data-action="{{ route($action->route, $p->id) }}">
              @else
                <a role="button" class="btn btn-sm {{ $action->class }}" href="{{ route($action->route, $p->id) }}">
              @endif
            @else
              <a role="button" class="btn btn-sm btn-default disable" disabled>
            @endif
                <i class="{{ $action->icon }}"></i> {{ $action->text }}
              </a>
          @endforeach
        </td>
      </tr>
    @empty
      @if (isset($placeholderView))
        @include($placeholderView)
      @endif
    @endforelse
    </tbody>
  </table>
  {{ $data->appends(['search' => $search, ])->fragment($type)->links() }}
  @if ($definition->hasColumn('deploy_status'))
  <script type="text/javascript">
  $(function() {
      function update_queue_duration() {
          $('#{{ $type  }}-table .queue-duration').each(function() {
              var $el = $(this),
                  start_time = moment($el.data('start-time')),
                  end_time = moment($el.data('end-time')),
                  now = moment(),
                  result = '';

              if (end_time < now) {
                  result = '已结束';
                  $el.toggleClass('text-danger', true);
              } else {
                  var duration = moment.duration(0);
                  var action = '';
                  if (start_time > now) {
                      action = '开始';
                      duration = moment.duration(start_time.diff(now));
                  } else if (end_time > now) {
                      action = '结束';
                      duration = moment.duration(end_time.diff(now));
                  }

                  result = Math.trunc(duration.asDays()) + '天' + duration.hours() + '小时' + duration.minutes() + '分钟后' + action;
                  // highlight duration within 24 hours
                  $el.toggleClass('text-red', duration.asDays() < 1);
              }

              $el.text(result);
          });
      }

      update_queue_duration();
      setInterval(update_queue_duration, 6000);
  });
  </script>
  @endif
</div>


