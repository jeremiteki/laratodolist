<?php

class PostsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /posts
	 *
	 * @return Response
	 */

	protected $post;

	public function _construct(Post $post){

		$this->post = $post;
	}

	public function index()
	{
		$posts= Post::all();

		return View::make('layouts.index', compact('posts'));
	}
public function view()
	{

		return View::make('layouts.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /posts/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('layouts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /posts
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$v = Validator::make(Input::All(),
			array(
				'name' => 'required|max:50|',
				'body' => 'required|max:200|min:10'
				)

			);

		if ($v->passes())
		{

			Post::create($input);

			return Redirect::route('posts.index');
		}
		return Redirect::route('layouts-create')
				->withInput()
				->withErrors($v)
				->with('message', 'There were validation errors');
	}

	/**
	 * Display the specified resource.
	 * GET /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$posts = Post::findOrFail($id);

		return View::make('layouts.show', compact('posts'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /posts/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$posts = Post::find($id);

		if (is_null($posts))
		{
			return Redirect::route('layouts.index');
		}

		return View::make('layouts.edit', compact('posts'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input= array_except(Input::all(), '_method');
		$v = Validator::make(Input::All(),
			array(
				'name' => 'required|max:50|',
				'body' => 'required|max:200|min:10'
				));

		if ($v->passes())
		{
			$posts = Post::find($id);
			$posts->update($input);

			return Redirect::route('posts.show', $id);
		}

		return Redirect::route('layouts.edit')
				->withInput()
				->withErrors($v)
				->with('message', 'There were validation errors');

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post::find($id)->delete();

		return Redirect::route('posts.index');
	}

}