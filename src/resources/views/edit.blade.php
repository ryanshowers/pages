@extends('app')
	
@section('meta_title', trans('pages::messages.edit.meta.title'))

@section('styles')
<link rel="stylesheet" href="{!! asset('vendor/ryanshowers/tags/css/selectize.css') !!}" />
<link rel="stylesheet" href="{!! asset('vendor/ryanshowers/tags/css/selectize.bootstrap3.css') !!}" />
<link rel="stylesheet" href="{!! asset('vendor/ryanshowers/tags/css/tags.css') !!}" />
@stop

@section('scripts')
<script type="text/javascript" src="{!! asset('vendor/ryanshowers/tags/js/standalone/selectize.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/ryanshowers/tags/js/tags.js') !!}"></script>
@stop

@section('content')
@if ($page)
<section id="content">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-xs-12">
	            <h1 class="page-header">
	                {{ trans('pages::messages.edit.title') }}
                    <a class="btn btn-primary pull-right" href="{!! route(config('pages.route') . '.show', $page->slug); !!}">View Page</a>
	            </h1>
	            @if ($page->trashed())
    	            <div class="alert alert-warning">Trashed on {{ $page->deleted_at }}.  Saving will remove the page from the trash.</div>
	            @endif
	            <form class="form-horizontal" role="form" method="POST" action="{!! route(config('pages.route') . '.update', $page->id) !!}">
	            
				    <input type="hidden" name="_token" value="{{ csrf_token() }}">
				    <input type="hidden" name="_method" value="PUT">

					<div class="form-group">
						<label class="col-md-3 control-label">Title</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="title" value="{{ $page->title }}">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Slug</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="slug" value="{{ $page->slug }}">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Meta Title</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="meta_title" value="{{ $page->meta_title }}">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Meta Description</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="meta_description" value="{{ $page->meta_description }}">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Meta Keywords</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="meta_keywords" value="{{ $page->meta_keywords }}">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Content</label>
						<div class="col-md-6">
							<textarea class="form-control" rows="20" name="content">{!! $page->content !!}</textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Image</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="image" value="{{ $page->image }}">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Attributes</label>
						<div class="col-md-6">
						    @if ($page->attributes)
						    @foreach(unserialize($page->attributes) as $key => $value)
                                <div class="row">
                                    <div class="col-xs-3">
        						        <input type="text" class="form-control" name="attributes[keys][]" value="{!! $key !!}">
        						    </div>
        						    <div class="col-xs-1">
                                        =>
                                    </div>
        						    <div class="col-xs-8">
        						        <input type="text" class="form-control" name="attributes[values][]" value="{!! $value !!}">
        						    </div>
                                </div>
						    @endforeach
						    @endif
						    <div class="row">
						        <div class="col-xs-3">
						            <input type="text" class="form-control" name="attributes[keys][]">
                                </div>
                                <div class="col-xs-1">
                                    =>
                                </div>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" name="attributes[values][]">
                                </div>
						    </div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Tags</label>
						<div class="col-md-6">
							<select
							    name="tags[]"
							    class="selectize"
							    multiple="true"
							    data-allow-create="true"
							    data-search-url="{!! route(config('tags.route') . '.index') !!}"
							    data-create-url="{!! route(config('tags.route') . '.store') !!}"
							 >
        					@if ($tags = $page->tags)
        					    @foreach ($tags as $tag)
        					    <?php $attrs = ['public' => $tag->public]; ?>
        					    <option data-data="<?php echo htmlentities(json_encode($attrs)); ?>" value="{{ $tag->id }}" selected="selected">{{ $tag->name}}</option>
        					    @endforeach
        					@endif
        					</select>
						</div>
					</div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Publish At</label>
                        <div class="col-md-6">
                            <input type="datetime-local" class="form-control" name="publish_at" value="{{ str_replace(' ', 'T', $page->publish_at) }}">
                            <p class="help-block">Leave blank to hide page</p>
						</div>
					</div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Unpublish At</label>
                        <div class="col-md-6">
                            <input type="datetime-local" class="form-control" name="unpublish_at" value="{{ str_replace(' ', 'T', $page->unpublish_at) }}">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">View</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="view" value="{{ $page->view }}">
							<p class="help-block">Use a custom view for this page</p>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Sort</label>
						<div class="col-md-6">
							<input type="number" class="form-control" name="sort" value="{{ $page->sort }}" min="0" max="99999999999" step="5">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<button type="submit" class="btn btn-block btn-primary">
								Submit
							</button>
						</div>
					</div>
				</form>
				
				<form class="form-horizontal" role="form" method="POST" action="{!! route(config('pages.route') . '.update', $page->id) !!}">
	            
				    <input type="hidden" name="_token" value="{{ csrf_token() }}">
				    <input type="hidden" name="_method" value="DELETE">
				    <div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<button type="submit" class="btn btn-block btn-danger">
								Delete
							</button>
						</div>
					</div>
	            </form>

	        </div>
        </div>
	</div>
</section>
@endif
@stop