@extends('layouts.app')
	
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

<section id="content">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-xs-12">
	            <h1 class="page-header">{{ trans('pages::messages.create.title') }}</h1>

	            <form class="form-horizontal" role="form" method="POST" action="{!! route(config('pages.route') . '.store') !!}">
	            
				    <input type="hidden" name="_token" value="{{ csrf_token() }}">
				    <!--<input type="hidden" name="_method" value="POST">-->

					<div class="form-group">
						<label class="col-md-3 control-label">Title</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="title" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Slug</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="slug" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Meta Title</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="meta_title" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Meta Description</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="meta_description" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Meta Keywords</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="meta_keywords" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Content</label>
						<div class="col-md-6">
							<textarea class="form-control" rows="20" name="content"></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Image</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="image" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Attributes</label>
						<div class="col-md-6">
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
        					</select>
						</div>
					</div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Publish At</label>
                        <div class="col-md-6">
                            <input type="datetime-local" class="form-control" name="publish_at" value="">
                            <p class="help-block">Leave blank to hide page</p>
						</div>
					</div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Unpublish At</label>
                        <div class="col-md-6">
                            <input type="datetime-local" class="form-control" name="unpublish_at" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">View</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="view" value="">
							<p class="help-block">Use a custom view for this page</p>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Sort</label>
						<div class="col-md-6">
							<input type="number" class="form-control" name="sort" value="">
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
				
	        </div>
        </div>
	</div>
</section>
@stop