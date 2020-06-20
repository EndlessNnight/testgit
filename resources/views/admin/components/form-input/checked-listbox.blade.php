<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}{{ isset($class) ? ' '.$class : '' }}">
  @set($_value, exist_input($field))
  <label for="{{ $field.'[]' }}">{{ $label }}</label>
  <div class="form-control listbox well well-sm">
    <ul id="{{ $field }}" class="list-group checked-listbox">
      @foreach ($data as $d)
        <li class="list-group-item{{ isset($_value[$d->id]) ? ' active' : '' }}">
          <input name="{{ sprintf('%s[%s]', $field, $d->id) }}" type="checkbox" class="hidden"{{ isset($_value[$d->id]) ? ' checked' : '' }} />
          <span title="{{ $d->description }}">
            <i class="state-icon fa"></i> {{ sprintf('%s [%s]', $d->name, $d->slug) }}
          </span>
        </li>
      @endforeach
    </ul>
  </div>
  @if ($errors->has($field))
    <span class="help-block">
      <strong>{{ $errors->first($field) }}</strong>
    </span>
  @endif
</div>
<script type="text/javascript">
    $('#{{ $field }}.checked-listbox .list-group-item').click(function() {
        $checkbox = $(this).find('input');
        $checkbox.prop('checked', !$checkbox.is(':checked'));

        $(this).toggleClass('active');
    });
</script>
