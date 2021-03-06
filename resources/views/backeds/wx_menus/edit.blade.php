@extends('layouts.app') 

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    	修改一级菜单
                    </h4>
                </div>
                <div class="panel-body">
                    <form action="{{ asset("backed/wxmenu/edit/{$wxMenu->id}") }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label">菜单名称：</label>
                            <input class="form-control" type="text" name="name" value="{{ $wxMenu->name or old('name') }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="control-label">菜单类型：</label>
                            <div>
                                <div class="checkbox-inline">
                                    <label>
                                        <input type="radio" name="type" value="click" 
                                        	{{ (isset($wxMenu) ? $wxMenu->type :  old('type')) == 'click' ? 'checked' : '' }}>
                                        点击事件
                                    </label>
                                </div>
                                <div class="checkbox-inline">
                                    <label>
                                    	<input type="radio" name="type" value="view" 
                                        {{ (isset($wxMenu) ? $wxMenu->type :  old('type')) == 'view'  ? 'checked' : '' }}>
                                        跳转链接
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('action') ? ' has-error' : '' }}">
                            <label class="control-label">菜单动作：</label>
                            <input class="form-control" type="text" name="action" value="{{ $wxMenu->action or old('action') }}" placeholder="点击事件填写key，跳转链接填写url">
                            @if($errors->has('action'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('action') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg btn-block">
                                <i class="glyphicon glyphicon-saved mr-2"></i>保存
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
