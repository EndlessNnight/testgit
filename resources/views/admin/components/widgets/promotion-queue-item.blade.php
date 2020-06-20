<div class="queue-item">
  <div class="queue-item-title">
    <span>{{ $promotion->status_text }}，<span class="queue-item-duration" data-start-time="{{ $promotion->start_time }}" data-end-time="{{ $promotion->end_time }}"></span></span>
  </div>
  <div class="queue-item-body">
    <div class="queue-item-property name">
      <span>{{ $promotion->name }}</span>
    </div>
    <div class="queue-item-property region">
      <span>{{ $promotion->regions->implode('display_name', '，') }}</span>
    </div>
    <div class="queue-item-property statistics">
      <span></span>
    </div>
  </div>
  <div class="queue-item-link">
    <a href="{{ route('promotion.detail', $promotion->id) }}">查看详情 >></a>
  </div>
</div>