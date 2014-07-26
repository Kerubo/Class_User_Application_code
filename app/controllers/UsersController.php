<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()

	{
		// pull all users from database
		$User = User::all();
		return View::make('users.index', compact('users'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$marital_status = array('Single', 'Divorced', 'Engaged', 'Complicated', 'Married');
		return View::make('users.create', compact('marital_status'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Format the date of birth to 'Y-m-d'
		$dob        = Input::get('dob'); // returns and array
		$datestring = $dob['year'] .'-'. $dob['month'] .'-'. $dob['day'];

		// Merge new date string back to Input
		Input::merge(['dob' => $datestring]);

		// Capture Form Data
		$payload    = Input::except('_token');
		// Validate data and return errors if any
		$validation = Validator::make($payload, User::$rules);

		if($validation->passes())
		{
			// Save data to database
			$user = User::create($payload);
			// Redirect user to profile page
			if ($user) {
				return Redirect::route('users.show', array($user->id));
			}
		}
		else
		{
			// Redirect the user back to the form and show them the errors made
			return Redirect::back()->withErrors($validation);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//picking the user with the set id
		$user = User::find($id);
		return View::make('users.show', compact ('users'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//Fetch Records
		$user =User::find($id);
        $marital_status = array('Single', 'Divorced', 'Engaged', 'Complicated', 'Married');
		return View::make('users.edit', compact('user',marital_status));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Edit the date of birth to 'Y-m-d'
		$dob        = Input::get('dob'); // returns and array
		$datestring = $dob['year'] .'-'. $dob['month'] .'-'. $dob['day'];

		// Merge new date string back to Input
		Input::merge(['dob' => $datestring]);

		// Capture Form Data
		$payload    = Input::except('_token');
		// Validate data and return errors if any
		$validation = Validator::make($payload, User::$rules);

		if($validation->passes())
		{
			// Save data to database
			//SQL Update 'users' SET (values) WHERE 'id' =$id

			$user = User::create($payload);
			$user ->update($payload);
			// Redirect user to profile page
			if ($user) {
				return Redirect::route('users.show', array($user->id))->with('alert','Record Update');
			}
		}
		else
		{
			// Redirect the user back to the form and show them the errors made
			return Redirect::back()->withErrors($validation)->withInput();
		}
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
