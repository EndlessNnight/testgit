<script type="text/javascript">
    $(function () {
        $('a[data-toggle=modal]').on('click', function (e) {
            var $a = $(e.currentTarget);
            var target = $a.data('target');
            var action = $a.data('action');
            if (action) {
                $(target).find('form').attr('action', action);
            }
        });
    });
</script>