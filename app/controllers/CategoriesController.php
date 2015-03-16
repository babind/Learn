<?php

class CategoriesController extends \BaseController {


	public function index()
	{
		$categories = Category::all();

		return View::make('categories.index',compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /categories/create
	 *
	 * @return Response
	 */
	public function create()
		{
			return View::make('categories.create');
		}


	public function store()
		{
			$validator = Validator::make($data = Input::all(),Category::$rules);

			if($validator->fails()){
				return Redirect::back()->withErrors($validator)->withInput();
			}

			Category::create($data);

			return Redirect::route('categories.index')->with('message','One Category is Created');
		}


	public function show($id)
	{

	}


	public function edit($id)
		{
			$categories = Category::find($id);

			return View::make('categories.edit',compact('categories'));
		}

	public function update($id)
		{
			$categories = Category::find($id);

			$validator = Validator::make($data = Input::all(), Category::$rules);

			if($validator->fails()){

				return Redirect::back()->withErrors($validator)->withInput();

			}
			return Redirect::route('categories.index')->with('message','Categories Updated');
		}

	public function destroy($id)
		{
			$categories=Category::find($id);
			Category::destroy($id);
			return Redirect::route('categories.index')->withMessage('One Category is Deleted');
		}

}