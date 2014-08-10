<?php

class AccountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		// echo '<h1>test !! index</h1>';
		$accounts = Account::all();
		return View::make('accounts.index')->with('accounts',$accounts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
				// load the create form (app/views/accounts/create.blade.php)
		// $users = User::all();  // this is wrong
		return View::make('accounts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
{

		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name_first'       => 'required',
			'name_last'       => 'required',
			'dob' => 'required',
			'email'      => 'required|email',
			'event' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('accounts/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$account = new Account;
			$account->name_first       = Input::get('name_first');
			$account->name_last       = Input::get('name_last');
			$account->dob       = Input::get('dob');
			$account->address       = Input::get('address');
			$account->phone       = Input::get('phone');
			$account->email      = Input::get('email');
			$account->event = Input::get('event');

			$account->save();

			// redirect
			Session::flash('message', 'Successfully added to RSVP!');
			return Redirect::to('accounts');
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
		//
				// get the account
		$account = Account::find($id);

		// show the view and pass the account to it
		return View::make('accounts.show')
			->with('account', $account);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
				// get the account
		$account = Account::find($id);

		// show the edit form and pass the account
		return View::make('accounts.edit')
			->with('account', $account);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'email'      => 'required|email',
			'account_level' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('accounts/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$account = Account::find($id);
			$account->name_first       = Input::get('name_first');
			$account->name_last       = Input::get('name_last');
			$account->dob       = Input::get('dob');
			$account->address       = Input::get('address');
			$account->phone       = Input::get('phone');
			$account->email      = Input::get('email');
			$account->event = Input::get('event');
			$account->save();


			// redirect
			Session::flash('message', 'Successfully updated account!');
			return Redirect::to('accounts');
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
				// delete
		$account = Account::find($id);
		$account->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the account!');
		return Redirect::to('accounts');
	}
	


}
