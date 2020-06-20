<input type="hidden" id="{{ $field }}" class="{{isset($class)?' '.$class:' '}}" name="{{ php_data_key($field) }}" value="{{ old($field, editing($field, 0)) }}" />
