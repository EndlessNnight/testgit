<script type="text/javascript">
    $(function() {
        $('a[data-toggle=modal]').on('click', function(e) {
            var $a = $(e.currentTarget);
            var target = $a.data('target');
            var url = $a.data('load-url');

            if (url) {
                $(target).find('.modal-content').load(url);
            }
        });
    });
</script>

