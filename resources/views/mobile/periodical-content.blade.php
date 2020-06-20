@extends('mobile.base')

@section('content')

    <div class="lmy1">
        <div class="lmy1_t">
            <h1><p> <img src="{{ url('/images/mobile/pic55.png') }}"></p>
                当前位置：<a href="{{route('mobile.home')}}">首页</a> &gt; <a href="{{route('mobile.periodical',['top_type' => $perContent->type->topType->id])}}">{{$perContent->type->topType->name}}</a> &gt;
            </h1>
        </div>
        <div class="zjy1 pl_nr">
            <div class="wzy">
                <div class="blank1"></div>
                <h2>《{{$perContent->name}}》</h2>
                <div class="blank1"></div>
                <h3>出版社：<span>{{$perContent->sponsor}}</span></h3>

                <div class="blank1"></div>
                <div class="nrbody">
                    <table class="data-table" id="product-attribute-specs-table">
                        <tbody>
                        <tr class="first odd">
                            <th class="label">刊名：</th>
                            <td class="data last">《{{$perContent->name}}》</td>
                        </tr>
                        <tr class="even"><th class="label">主管单位：</th>
                            <td class="data last"><span class="price">{{$perContent->responsible}}</span></td>
                        </tr>
                        <tr class="odd"><th class="label">主办单位：</th>
                            <td class="data last">{{$perContent->sponsor}}</td>
                        </tr>
                        <tr class="odd"><th class="label">级别：</th>
                            <td class="data last">{{ \App\Models\Admin\Periodical::LEVEL_ARRAY[$perContent->level] }}</td>
                        </tr>
                        <tr class="even"><th class="label">ISSN：</th>
                            <td class="data last">{{$perContent->international_ornp}}</td>
                        </tr>
                        <tr class="odd"><th class="label">CN：</th>
                            <td class="data last">{{$perContent->internal_ornp}}</td>
                        </tr>
                        <tr class="odd"><th class="label">办刊收录：</th>
                            <td class="data last">{{$perContent->employ_web_text}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="blank"></div>

                    <p>{{$perContent->synopsis}}<br><br>
                    </p>

                    @if(!empty($perContent->employ_impact))
                    <p>{{$perContent->employ_impact}}<br>
                    </p>
                    @endif

                    @if(!empty($perContent->demand))
                    <p>征稿要求：{{$perContent->demand}}<br><br>
                    </p>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection