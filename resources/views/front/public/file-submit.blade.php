<div class="file_box {{isset($class)?$class:''}}">
    <input type="file" id="contribute_file" name="contribute_file"
           accept="application/txt,application/doc,application/rar,application/zip,application/docx">
    <span class="show_text">{{ isset($file['name'])?$file['name']:'' }}</span>
    <button type="button" class="btn_file_action">{{ isset($file['id'])?'上传成功':'上传' }}</button>
    <input class="file_id" id="file_id" type="hidden" name="file_id" value="{{ isset($file['id'])?$file['id']:'' }}">
</div>
<script>
    var submit_status = 0;
    $("#contribute_file").change(function () {
        submit_status = 0;
        $(".btn_file_action").text('上传');
    });
    $(".btn_file_action").click(function () {
        var formData = new FormData();
        var file = document.getElementById("contribute_file").files[0];
        if(file === undefined){
            alert('请选择上传文件');
        }else{
            if(submit_status === 1){
                alert('文件已上传');
                return false;
            }
            $(".btn_file_action").text('上传中');
            formData.append("file", document.getElementById("contribute_file").files[0]);
            formData.append("contribute_id",document.getElementById("periodical_id").value);
            $.ajax({
                url: "{{ route('home.file.post') }}",
                type: "POST",
                data: formData,
                /**
                 *必须false才会自动加上正确的Content-Type
                 */
                contentType: false,
                /**
                 * 必须false才会避开jQuery对 formdata 的默认处理
                 * XMLHttpRequest会对 formdata 进行正确的处理
                 */
                processData: false,
                success: function (res) {
                    if (res.code === 200) {
                        submit_status = 1;
                        $('#file_id').val(res.file.id);
                        $(".btn_file_action").text('上传成功');
                        var local = 'http://'+window.location.host;
                        local = local.slice(0,local.length - 1);
                        $("#dizhi").val(local+res.file.url);
                        $("#file_url").val(local+res.file.url);
                        alert("上传成功！");
                    }else{
                        submit_status = 0;
                        var msg = "上传失败！请检查文件格式和大小!";
                        if(typeof res.msg !== "undefined") msg = res.msg;
                        alert(msg);
                        $(".btn_file_action").text('上传');
                    }
                },
                error: function (res) {
                    submit_status = 0;
                    $(".btn_file_action").text('上传');
                    alert("上传失败！请检查文件格式和大小!");
                }
            });
        }
    });
</script>
