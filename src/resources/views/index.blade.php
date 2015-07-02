@extends('app')
	
@section('meta_title', trans('pages::messages.index.meta.title'))
@section('meta_description', trans('pages::messages.index.meta.description'))
@section('meta_keywords', trans('pages::messages.index.meta.keywords', ['pages' => implode(',', array_pluck($pages, 'title'))]))

@section('content')

<section id="content">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-xs-12">
	            <h1 class="page-header">{{ config('pages.indexTitle') }}</h1>
	            <div class="list-group">
	            @foreach ($pages as $page)
	                <a href="{!! route(config('pages.route') . '.show', $page->slug); !!}" class="list-group-item">
	                    {{ $page->title }}<br />
	                    <small>{{ str_limit(strip_tags($page->content), 100) }}</small>
	                </a>
	            @endforeach
	            </div>
	        </div>
        </div>
        {!! $pages->render() !!}
	</div>
</section>
@stop