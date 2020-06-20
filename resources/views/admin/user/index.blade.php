@extends('admin.dashboard')

@push('head')
    @include('admin.scripts.modal-editor')
@endpush


@section('content')
    <div class="box box-info content-editor" style="width: 500px;">
        <div class="box-header with-border border-bottom-1">
            <h3 class="box-title">个人资料修改</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" >
            {{ csrf_field() }}
            @include('admin.components.form-input.id', ['field' => 'id', ])
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">权限</label>

                    <div class="col-sm-6">
                        <input type="text" disabled="disabled" class="form-control" id="name" placeholder="输入名称" value="{{$user->name}}">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div style="padding: 0 80px;">
                    @include('admin.components.editor-form.img-input',['field' => 'head_url','title' => '头像设置','type'=>'image' ,'value' => $user->head_img,'success_url' => route('admin.user.updateHeadImg'),'info' => '* 图片类型：png | gif | jpeg | jpg <br/>* 图片大小：200*200 或 同比例<br/>* 大小不得超过2M'])
                </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <button type="button" data-toggle="modal" data-target="#modal-editor" class="btn btn-info ">修改密码</button>
                {{--<button type="submit" class="btn pull-right btn-default">取消</button>--}}
            </div>

        </form>
        <div class="modal fade" id="modal-editor">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <form class="form-horizontal validate" data-action="{{ route('admin.user.updatePassword') }}">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">修改密码</h4>
                        </div>
                        <div class="modal-body">
                            @include('admin.components.editor-form.password',['field' => 'password_old','label' => '旧密码','placeholder' => '输入旧密码','validate' => 'password'])
                            @include('admin.components.editor-form.password',['field' => 'password_new','label' => '新密码','placeholder' => '输入新密码','validate' => 'password'])
                            @include('admin.components.editor-form.password',['field' => 'password_confirm','label' => '确认密码','placeholder' => '确认密码','validate' => 'password'])
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary pull-left btn-submit">立即修改</button>
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">关闭</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
