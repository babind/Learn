<?php

class PostsController extends \BaseController {

	public function index()
	{
		$posts = Post::all();

		return View::make('posts.index',compact('posts'));
	}


	public function create()
		{
			return View::make('posts.create');
		}


	public function store()
		{
			$validator = Validator::make($data = Input::all(),Post::$rules);

			if($validator->fails()){
				return Redirect::back()->withErrors($validator)->withInput();
			}

			Post::create($data);

			return Redirect::route('posts.index')->with('message','One Post is Created');
		}


	public function show($id)
		{

		}


	public function edit($id)
		{
			$posts = Post::find($id);

			return View::make('posts.edit',compact('posts'));
		}

	public function update($id)
		{
			$posts = Post::find($id);

			$validator = Validator::make($data = Input::all(), Post::$rules);

			if($validator->fails()){

				return Redirect::back()->withErrors($validator)->withInput();

			}
			Post::update($data);
			return Redirect::route('posts.index')->with('message','posts Updated');
		}

	public function destroy($id)
		{
		$posts=Post::find($id);
			Post::destroy($id);
			return Redirect::route('posts.index')->withMessage('One Post is Deleted');
		}

}