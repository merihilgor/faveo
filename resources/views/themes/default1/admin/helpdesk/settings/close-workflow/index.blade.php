@extends('themes.default1.admin.layout.admin')


<?php
        $title = App\Model\helpdesk\Settings\System::where('id', '=', '1')->first();
        if (($title->name)) {
            $title_name = $title->name;
        } else {
            $title_name = "SUPPORT CENTER";
        }
        
        ?>
@section('meta-tags')


<meta name="title" content="{!! Lang::get('lang.close_ticket_workflow-page-title') !!} :: {!! strip_tags($title_name) !!} ">

<meta name="description" content="{!! Lang::get('lang.close_ticket_workflow-page-description') !!}">


@stop
@section('custom-css')
        <link href="{{assetLink('css', 'select2')}}" rel="stylesheet" type="text/css"/>
@stop
@section('Tickets')
active
@stop

@section('close-workflow')
class="active"
@stop

@section('PageHeader')
<h1>{!! Lang::get('lang.close_ticket_workflow') !!}</h1>
@stop

@section('header')
@stop

@section('content')

     @if(Session::has('success'))
        <div class="alert alert-success alert-dismissable">
            <i class="fa fa-check-circle"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('success')}}
        </div>
        @endif
        @if(Session::has('failed'))
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <b>{!! Lang::get('lang.alert') !!}!</b>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{Session::get('failed')}}</p>                
        </div>
        @endif
        @if(Session::has('errors'))
        <?php //dd($errors); ?>
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <b>{!! Lang::get('lang.alert') !!}!</b>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <br/>
            @if($errors->first('days'))
            <li class="error-message-padding">{!! $errors->first('days', ':message') !!}</li>
            @endif
            @if($errors->first('condition'))
            <li class="error-message-padding">{!! $errors->first('condition', ':message') !!}</li>
            @endif
            @if($errors->first('send_email'))
            <li class="error-message-padding">{!! $errors->first('send_email', ':message') !!}</li>
            @endif
            @if($errors->first('status'))
            <li class="error-message-padding">{!! $errors->first('status', ':message') !!}</li>
            @endif
        </div>
        @endif
        
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{!! Lang::get('lang.settings-2') !!}</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
   
        {!! Form::model($security,['route'=>['close-workflow.update', $security->id],'method'=>'PATCH','id'=>'Form','files' => true]) !!}
        <div class="form-group {{ $errors->has('days') ? 'has-error' : '' }}">
            <div class="row">
                <div class="col-md-3">
                    <label for="title">{!! Lang::get('lang.no_of_days') !!}: <span class="text-red"> *</span></label>
                </div>
                <div  class="col-md-6">
                    <div class="callout callout-default" style="font-style: oblique;">{!! Lang::get('lang.close-msg1') !!}</div>
                    {!! Form::text('days',null,['class'=>'form-control'])!!}
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('send_email') ? 'has-error' : '' }}"> 
            <div class="row">
                <div class="col-md-3">
                    <label for="title">{!! Lang::get('lang.send_email_to_user') !!}:</label>
                </div>
                <div class="col-md-6">
                    <div class="callout callout-default" style="font-style: oblique;">{!! Lang::get('lang.close-msg4') !!}</div>
                    <div class="row">
                        <div class="col-xs-3">
                            {!! Form::radio('send_email',1) !!} {{Lang::get('lang.yes')}}
                        </div>
                        <div class="col-xs-3">
                            {!! Form::radio('send_email',0) !!} {{Lang::get('lang.no')}}
                        </div>
                    </div>       
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('ticket_status') ? 'has-error' : '' }}"> 
            <div class="row">
                <div class="col-md-3">
                    <label for="title">{!! Lang::get('lang.ticket_status') !!}:</label>
                </div>
                <div class="col-md-6">
                    <div class="callout callout-default" style="font-style: oblique;">{!! Lang::get('lang.close_ticket_statu_msg') !!}</div>
                    {!! Form::select('ticket_status[]',[ Lang::get('lang.status')=>$statuses->pluck('name', 'id')->toArray()],$ticketStatus,['class' => 'form-control', 'multiple' => true, 'id' =>'ticket-status', 'required' => true, 'style' => 'width:100%']) !!}   
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}"> 
            <div class="row">
                <div class="col-md-3">
                    <label for="title">{!! Lang::get('lang.target_status') !!}:</label>
                </div>
                <div class="col-md-6">
                    <div class="callout callout-default" style="font-style: oblique;">{!! Lang::get('lang.close-msg3') !!}</div>
                    <?php $user = \App\Model\helpdesk\Ticket\Ticket_Status::whereIn('id', getStatusArray('closed'))->get(); ?>
                    {!! Form::select('status',[ Lang::get('lang.status')=>$user->pluck('name','id')->toArray()],null,['class' => 'form-control']) !!}	
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-9">
              <button type="submit" class="btn btn-primary" id='submit' data-loading-text="<i class='fa fa-circle-o-notch fa-spin'>&nbsp;</i> {!! Lang::get('lang.saving') !!}"><i class="fa fa-floppy-o">&nbsp;&nbsp;</i>{!!Lang::get('lang.save')!!}</button>
            
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop
@push('scripts')
<script src="{{assetLink('js','select2')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#ticket-status').select2({
            placeholder: "{{ trans('lang.select_status') }}",
            allowClear: true
        }); 
    });
</script>
@endpush
