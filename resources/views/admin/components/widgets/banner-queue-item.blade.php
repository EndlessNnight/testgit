<div class="queue-item">
  <div class="queue-item-title">
    <span>{{ $banner->status_text }}，<span class="queue-item-duration" data-start-time="{{ $banner->start_time }}" data-end-time="{{ $banner->end_time }}"></span></span>
  </div>
  <div class="queue-item-body">
    <div class="queue-item-property name">
      <span>{{ $banner->name }}</span>
    </div>
    <div class="queue-item-property region">
      <span>{{ $banner->regions->implode('display_name', '，') }}</span>
    </div>
    <div class="queue-item-property statistics">
      <span></span>
    </div>
  </div>
  <div class="queue-item-link">
    <a href="#">查看详情 >></a>
  </div>
</div>