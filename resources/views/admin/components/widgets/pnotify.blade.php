@if (Session::has('p_notify'))
  @set ($pnotify, Session::get('p_notify'))
  @if (is_array($pnotify))
    @if (isset($pnotify['title']))
<script type="text/javascript">
    $(function() {
        new PNotify({
            title: "{!! data_get($pnotify, 'title') !!}",
            text: "{!! data_get($pnotify, 'text') !!}",
            type: "{!! data_get($pnotify, 'type') !!}"
        });
    });
</script>
    @else
<script type="text/javascript">
    $(function() {
        new PNotify({
            text: "{!! data_get($pnotify, 'text') !!}",
            type: "{!! data_get($pnotify, 'type') !!}"
        });
    });
</script>
    @endif
  @else
<script type="text/javascript">
    $(function() {
        new PNotify($pnotify);
    });
</script>
  @endif
@endif