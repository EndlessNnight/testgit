<script type="text/javascript">
    $(function () {
      @if (count($errors) > 0)
        // Display modal if the page is validation failed route-back
        $('.modal-editor').modal('show');

      @endif
        // Reset editor when close editing
        $('.modal-editor').on('hidden.bs.modal', function (e) {
            var $modal = $(e.currentTarget);

            var key = $modal.data('editor-key');
            key = key || 'id';
            var value = $modal.find('#' + key).val();

            if (value && value != '0') {
                var url = $modal.data('editor-url');
                if (url) {
                    $modal.find('.modal-content').load(url);
                }
            }
        });
    });
</script>