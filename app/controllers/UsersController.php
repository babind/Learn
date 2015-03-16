<?php

class UsersController extends \BaseController {

	public function index()
	{
		$users = User::all();

		return View::make('users.index',compact('users'));
	}


	public function create()
		{
			return View::make('users.create');
		}


	public function store()
		{
			$validator = Validator::make($data = Input::all(),User::$rules);

			if($validator->fails()){
				return Redirect::back()->withErrors($validator)->withInput();
			}

			User::create($data);

			return Redirect::route('users.index')->with('message','One user is Created');
		}


	public function show($id)
		{

		}


	public function edit($id)
		{
			$users = User::find($id);

			return View::make('users.edit',compact('users'));
		}

	public function update($id)
		{
			$users = User::find($id);

			$validator = Validator::make($data = Input::all(), User::$rules);

			if($validator->fails()){

				return Redirect::back()->withErrors($validator)->withInput();

			}
			User::update($data);
			return Redirect::route('users.index')->with('message','users Updated');
		}

	public function destroy($id)
		{
		$users=User::find($id);
			User::destroy($id);
			return Redirect::route('users.index')->withMessage('One user is Deleted');
		}

}