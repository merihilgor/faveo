@extends('themes.default1.admin.layout.admin')

@section('Plugins')
active
@stop

@section('settings-bar')
active
@stop

@section('plugin')
class="active"
@stop

@section('HeadInclude')
@stop
<!-- header -->
@section('PageHeader')
<h1>{!! Lang::get('lang.plugins') !!}</h1>
@stop
<!-- /header -->
<!-- breadcrumbs -->
@section('breadcrumbs')
<ol class="breadcrumb">
</ol>
@stop
<!-- /breadcrumbs -->
<!-- content -->
@section('content')
     @if(Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <i class="fa  fa-check-circle"></i>
                <b>Success!</b>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('success')}}
            </div>
        @endif
        <!-- failure message -->
        @if(Session::has('fails'))
            <div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <b>Alert!</b> Failed.
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('fails')}}
            </div>
        @endif
<!-- open a form -->

	{!! Form::open(['url' => 'providers/postsettings', 'method' => 'POST','files'=>true]) !!}

<!-- <div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}"> -->
	<!-- table  -->

<div class="box box-primary">
	<div class="box-header">
        <h4 class="box-title">{{Lang::get('SMS::lang.sms-providers')}}</h4>
    </div>
    <!-- check whether success or not -->
	<!-- Name text form Required -->
 	<div class="box-body">
   
        <div class="row">
            <div class="col-md-12 form-group {{ $errors->has('provider_id') ? 'has-error' : '' }}">
                {!! Form::label('provider_id', Lang::get('SMS::lang.select-provider')) !!}
                {!! $errors->first('provider_id', '<spam class="help-block">:message</spam>') !!}
                {!! Form::select('provider_id',['Providers'=>$providers->pluck('name','id')->toArray()],$provider_id,['class' => 'form-control', 'onchange' => 'myFunction(this.value)', 'id' => 'providers']) !!}
            </div>
            <div id='msg91-form'>
                <div class="col-md-12 form-group {{ $errors->has('auth_key') ? 'has-error' : '' }}">
                    {!! Form::label('auth_key', Lang::get('SMS::lang.auth-key')) !!}
                    {!! $errors->first('auth_key', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('auth_key',$auth_key,['class' => 'form-control', 'id' => 'auth-key', 'placeholder' => Lang::get('SMS::lang.auth-key-placeholder')]) !!}
                </div>
                
                <div class="col-md-12 form-group {{ $errors->has('sender_id') ? 'has-error' : '' }}">
                    {!! Form::label('sender_id', Lang::get('SMS::lang.sender-id')) !!}
                    {!! $errors->first('sender_id', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('sender_id',$sender_id,['class' => 'form-control', 'id' => 'sender-id', 'placeholder' => Lang::get('SMS::lang.sender-id-placeholder')]) !!}
                </div>

                <div class="col-md-12 form-group {{ $errors->has('route') ? 'has-error' : '' }}">
                    {!! Form::label('route', Lang::get('SMS::lang.route')) !!}
                    {!! $errors->first('route', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('route',$route,['class' => 'form-control', 'id' => 'route', 'placeholder' => Lang::get('SMS::lang.route-placeholder')]) !!}
                </div>
                    
            </div>
            <div id='smslive-form' style="display: none">
                <div class="col-md-12 form-group {{ $errors->has('owner_email') ? 'has-error' : '' }}">
                    {!! Form::label('owner_email', Lang::get('SMS::lang.email')) !!}
                    {!! $errors->first('owner_email', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('owner_email',$owner_email,['class' => 'form-control', 'id' => 'owner-email', 'placeholder' => Lang::get('SMS::lang.email-placeholder')]) !!}                      
                </div>

                <div class="col-md-12 form-group {{ $errors->has('subacc') ? 'has-error' : '' }}">
                    {!! Form::label('subacc', Lang::get('SMS::lang.sub-account')) !!}
                    {!! $errors->first('subacc', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('subacc',$subacc,['class' => 'form-control', 'id' => 'subacc', 'placeholder' => Lang::get('SMS::lang.sub-account-plcaeholder')]) !!}                               
                </div>

                <div class="col-md-12 form-group {{ $errors->has('subacc_pass') ? 'has-error' : '' }}">
                    {!! Form::label('subacc_pass', Lang::get('SMS::lang.subacc-password')) !!}
                    {!! $errors->first('subacc_pass', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('subacc_pass',$subacc_pass,['class' => 'form-control', 'id' => 'subacc-pass', 'placeholder' => Lang::get('SMS::lang.subacc-pswd-placeholder')]) !!}                        
                </div>
                <div class="col-md-12 form-group {{ $errors->has('smslive_sender_id') ? 'has-error' : '' }}">
                    {!! Form::label('smslive_sender_id', Lang::get('SMS::lang.sender')) !!}
                    {!! $errors->first('smslive_sender_id', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('smslive_sender_id',$smslive_sender_id,['class' => 'form-control', 'id' => 'subacc-pass', 'placeholder' => Lang::get('SMS::lang.sender-placeholder')]) !!}                        
                </div>
            </div>
            <div class="col-md-12 form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                {!! Form::label('mobile', Lang::get('SMS::lang.mobile')) !!}
                {!! $errors->first('mobile', '<spam class="help-block">:message</spam>') !!}
                {!! Form::text('mobile',null,['class' => 'form-control', 'id' => 'mobile', 'placeholder' => Lang::get('SMS::lang.mobile-placeholder')]) !!}
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="row"> 
            <div class="col-md-12"> 
<!--            {!! Form::submit(Lang::get('lang.save'),['class'=>'form-group btn btn-primary'])!!}-->
             <button type="submit" class="form-group btn btn-primary"><i class="fa fa-floppy-o">&nbsp;&nbsp;</i>{!!Lang::get('lang.save')!!}</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('FooterInclude')
<script>


    $(document).ready(function() {
        var value = $("#providers").val();
        myFunction(value);
    });
    function myFunction(value){
        if(value == 1) {
            $('#msg91-form').css('display', 'block');
            $('#auth-key').attr('disabled', false);
            $('#sender-id').attr('disabled', false);
            $('#route').attr('disabled', false);
            $('#owner-email').attr('disabled', true);
            $('#subacc-pass').attr('disabled', true);
            $('#subacc').attr('disabled', true);
            $('#smslive-form').css('display', 'none');
        } else {
            $('#msg91-form').css('display', 'none');
            $('#auth-key').attr('disabled', true);
            $('#sender-id').attr('disabled', true);
            $('#route').attr('disabled', true);
            $('#owner-email').attr('disabled', false);
            $('#subacc-pass').attr('disabled', false);
            $('#subacc').attr('disabled', false);
            $('#smslive-form').css('display', 'block');
        }
    }
</script>
@stop

<!-- /content -->
