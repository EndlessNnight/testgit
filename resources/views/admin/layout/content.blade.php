<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$top_title or ''}}
            <small>{{$sec_title or ''}}</small>
        </h1>
        @if(!empty($dashboard))
        <ol class="breadcrumb">
            @foreach($dashboard as $t => $r)
                @if(!empty($r))
                    <li><a href="{{$r}}"><i class="fa fa-dashboard"></i> {{$t}}</a></li>
                @else
                    <li @if($loop->last) class="active" @endif>{{$t}}</li>
                @endif
            @endforeach
        </ol>
        @endif()
    </section>

    @yield('content')
</div>
