<script>
    $('.datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        extraFormats: ['YYYY-MM-DD'],
        showClose: true,
        showClear: true,
        // startDate:new Date(new Date()-1000 * 60 * 60 * 24 * 365),  //只显示一年的日期365天
        // endDate : new Date(),
        {{--maxDate : new Date() - 1000 * 3600 * 24,--}}
        {{--minDate : new Date() - {{ config('app.picker_start_date') }} * 1000,--}}
    });
</script>