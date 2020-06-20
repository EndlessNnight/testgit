

<div class="form-group {{ isset($class) ? ' '.$class : '' }}">
    <label for="{{ $field }}">{{ $label }}</label>
    <!-- /.box-header -->
    <div class="box-body pad">
        <!-- 加载编辑器的容器 -->
        <script id="{{ $field }}" name="{{ $field }}" type="text/plain">{!!   old($field, editing($field)) ?? (isset($default) ? $default : '') !!}</script>
        <!-- 配置文件 -->

        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            var ue = UE.getEditor('{{ $field }}');
        </script>
    </div>
</div>

<script>

</script>
