@extends('layouts.app')
	
@section('meta_title', $page->meta_title ?: $page->title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)

@section('content')

<section id="{{$page->slug}}" class="section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<h1 class="page-header">
				    {{ $page->title }}
				    @if (Auth::check())
				    <small class="pull-right"><a href="{!! route(config('pages.route') . '.edit', $page->slug) !!}"><i class="fa fa-pencil"></i></a></small>
                    @endif
				</h1>
				{!! $page->content !!}
				@if (!$page->tags->isEmpty())
				    <p>Tags:
				    @foreach ($page->tags as $tag)
				        <a href="{!! route(config('tags.route') . '.show', $tag->slug) !!}" class="label label-primary">{{ $tag->name }}</a>
				    @endforeach
				    </p>
				@endif
			</div>
		</div>
	</div>
</section>
@stop