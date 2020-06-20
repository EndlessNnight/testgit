@extends('admin.layout.dashboard')

@section('content')


<section id="app" class="content-box content-editor profile-editor">
    <div class="container-fluid"><div class="page-header"><span class="page-title">编辑资料</span></div></div>
    <div class="container-fluid profile-content">
        <form class="form-horizontal"><!---->
            <div class="form-group">
                <label for="email" class="control-label col-sm-2 col-xs-3">邮箱</label>
                <div class="col-sm-6 col-xs-9"><input type="text" id="email" name="email" disabled="disabled" class="form-control"></div>
            </div>
            <div class="form-group"><label for="phone" class="control-label col-sm-2 col-xs-3">手机号码</label>
                <div class="col-sm-6 col-xs-9"><input type="text" id="phone" name="phone" disabled="disabled" class="form-control"></div>
            </div>
            <div class="form-group"><label for="name" class="control-label col-sm-2 col-xs-3">姓名</label>
                <div class="col-sm-6 col-xs-9"><input type="text" id="name" name="name" class="form-control"></div>
            </div>
            <div class="modal-footer"><a role="button" id="btn-change-password" data-toggle="modal" data-target="#change-password" class="btn btn-info pull-left">修改密码</a>
                <a role="button" class="btn btn-primary pull-right">保存</a>
            </div>
        </form>
    </div>
    <div id="enable-2fa" data-backdrop="static" data-keyboard="false" role="dialog" class="modal modal-editor fade">
        <div role="document" class="modal-dialog"><div class="modal-content">
                <form class="clearfix">

                    <div class="modal-footer">
                        <a role="button" href="#" data-dismiss="modal" class="btn btn-default">取消</a>
                        <a role="button" href="#" class="btn btn-primary">保存</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="change-password" data-backdrop="static" data-keyboard="false" role="dialog" class="modal modal-editor fade" style="display: none;">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <form class="clearfix">
                    <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                            <span aria-hidden="true">×</span></button> <h4 class="modal-title">修改密码</h4>
                    </div>
                    <div class="modal-body clearfix">
                        <div class="form-group col-sm-8">
                            <label for="old_password">旧密码</label>
                            <input type="password" id="old_password" data-vv-name="old_password" class="form-control" aria-required="true" aria-invalid="false">
                            <span class="help-block" style="display: none;">


                            </span>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-sm-8"><label for="new_password">新密码</label>
                            <input type="password" id="new_password" name="new_password" data-vv-name="new_password" class="form-control" aria-required="true" aria-invalid="false">
                            <span class="help-block" style="display: none;">


                            </span>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-sm-8">
                            <label for="new_password_confirmation">确认密码</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" data-vv-name="new_password_confirmation" class="form-control" aria-required="true" aria-invalid="false">
                            <span class="help-block" style="display: none;"></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="modal-footer">
                        <a role="button" data-dismiss="modal" class="btn btn-default">取消</a>
                        <a role="button" class="btn btn-primary">保存</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
