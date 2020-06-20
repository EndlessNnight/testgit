<div data-id="{{ $item->id }}" data-updated-at="{{ $item->updated_at }}" class="lockscreen-banner{{ $item->last_status == \App\Models\Promotion::STATUS_REJECTED ? ' has-rejected' : '' }}{{ in_array($item->last_status, [\App\Models\Promotion::STATUS_REJECTED, \App\Models\Promotion::STATUS_DRAFT, \App\Models\Promotion::STATUS_DEPLOYED, ]) ? ' has-checkbox' : '' }}">
  <div class="lockscreen-banner-image">
    <img src="{{ data_get($item->banners, '0.resource.url') }}" />
  </div>
  <div class="lockscreen-banner-details">
    <div class="lockscreen-banner-checkbox">
      <div class="checkbox">
        <input type="checkbox" id="lockscreen-banner-{{ $item->id }}->checkbox" />
        <label for="lockscreen-banner-{{ $item->id }}->checkbox">{{ $item->name }}</label>
      </div>
    </div>
    <div class="lockscreen-banner-name">{{ $item->name }}</div>
    <div class="lockscreen-banner-rejected-text">{{ data_get($item->last_audit_log, 'extra_object.text') }}</div>
  </div>
</div>