@extends('themes.default1.agent.layout.agent')
@extends('themes.default1.agent.layout.sidebar')    
<?php
        $title = App\Model\helpdesk\Settings\System::where('id','1')->value('name');
        $titleName = ($title) ? $title :"SUPPORT CENTER";
 ?>
@section('meta-tags')
<meta name="title" content="{!! Lang::get('lang.article_template_edit-page-title') !!} :: {!! strip_tags($titleName) !!} ">
<meta name="description" content="{!! Lang::get('lang.article_template_edit-page-description') !!}">
@stop  
@section('custom-css')
<link href="{{assetLink('css','blue')}}" rel="stylesheet"  type="text/css"/>
@stop    
@section('article')
active
@stop

<style type="text/css">
	.cke_chrome {
     display: none !important;  
	}
</style>

@section('add-article-template')
class="active"
@stop

@section('PageHeader')
<h1>{{Lang::get('lang.article_template')}}</h1>
@stop

<script src="{{assetLink('js','vue-ckeditor')}}" type="text/javascript" async></script>

@section('content')
    <div id="app-agent">
        <article-template></article-template>
    </div>
    <script src="{{asset('js/agent.js')}}" type="text/javascript"></script>
@stop