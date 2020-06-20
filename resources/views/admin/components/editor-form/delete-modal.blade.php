<div class="modal fade in" id="modal-delete" data-action="{{ $action or '' }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{{ $title or '确认删除？' }}</h4>
            </div>
            <div class="modal-body">
                {{ $content or '数据删除后将无法恢复，确认删除？' }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left delete-confirm ">{{ $confirm or '立即删除' }}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ $close or '关闭' }}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
$(document).ready(function () {
    var url = '';
    var t = true;
    $(".delete").click(function () {
        __this = $(this);
        url = __this.data('action');
    });

    $("#modal-delete .delete-confirm").click(function () {
        __this = $(this);
        if(typeof url === "undefined" || url === ''){
            console.error('url is undefined or null');
        }else{
            if(t){
                t = false;
                $.get(url,function (res) {
                    if(res.code !== 200){
                        showMsg('error',res.msg);
                        __this.removeClass(ed);
                        t = true;
                    }else{
                        var url = res.url || null;
                        showMsg('success',res.msg,res.url);
                    }
                });
            }
        }
    });
})
</script>
