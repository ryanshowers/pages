<?php

namespace Ryanshowers\Pages;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ryanshowers\Pages\Page;

use Illuminate\Http\Request;

class PageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Page::published()->orderBy('created_at', 'desc')->paginate(10);
		return view('pages::index', [
			'pages' => $pages
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$page = Page::with(['tags' => function($query) {
    		$query->where('public', '=', '1');
		}])->where('slug','=', $slug)->first();
		
		//If the page slug exists, show it. Otherwise search for tags
		if ($page) {
    		$view = $page->view ?: 'pages::show';
            return view($view, [
			    'page' => $page
            ]);
        } else {
    		$pages = Page::whereHas('tags', function($query) use ($slug) {
                $query->where('name', '=', $slug);
            })->published()->paginate(10);
            return view('pages::index', [
			    'pages' => $pages
            ]);
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
