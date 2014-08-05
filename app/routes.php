<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});
#>>>------------test
Route::get('/get-environment', function() {
    echo App::environment();
});
Route::get('/trigger-error',function() {

    # Class Foobar should not exist, so this should create an error
    $foo = new Foobar;

});
Route::get('/books/{category}', function($category) {
        return 'Here are all the books in the category of '.$category;
});
// 1.get userform
Route::get('userform', function()
{
    return View::make('userform');
});

//2. post data from userform

Route::post('userform', array('before' => 'csrf', function()
{
    $rules = array(
        'email'    => 'required|email|different:username',
        'username' => 'required|min:6',
        'password' => 'required|same:password_confirm',
				'no_email' => 'honey_pot'
    );

    $messages = array(
        'min' => 'The :attribute is too short, it must be at least :min characters in length.',
        'username.required' => 'You are missing your Username.',
				'honey_pot' => 'Nothing should be in this field.'
    );

    $validation = Validator::make(Input::all(), $rules,$messages);

    if ($validation->fails())
    {
        return Redirect::to('userform')->withErrors($validation)->withInput();
    }

    return Redirect::to('userresults')->withInput();
}));

Validator::extend('honey_pot', function($attribute, $value,$parameters)
{
    return $value == '';
});

Route::get('userresults', function()
{
    return dd(Input::old());
});
//
// Route::get('userresults', function()
// {
// 		return 'Your username is: '.Input::old('username')
// 				.'<br>Your favorite color is: '
// 				.Input::old('color');
// });

Route::get('mysql-test', function() {

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    return Pre::render($results);

});
