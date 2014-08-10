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
Route::get('/', 'IndexController@showIndex');
// Route::get('/signup', 'UserController@getSignup');
// Route::get('/login', 'UserController@getLogin' );
// Route::post('/signup', 'UserController@postSignup');
// Route::resource('user', 'UserController');


Route::get('/signup', 'UserController@getSignup');
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', ['before' => 'csrf', 'uses' => 'UserController@postSignup'] );
Route::post('/login', ['before' => 'csrf', 'uses' => 'UserController@postLogin'] );
Route::get('/logout', ['before' => 'auth', 'uses' => 'UserController@getLogout'] );

Route::resource('accounts','AccountController');
Route::resource('events','EventController');
// Route::get('/','IndexController@showIndex');

// Route::get('/', function()
// {
// 	return View::make('index');
// });

#>>>------------test-environment
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

// Route::get('users', 'UsersController@actionIndex');
// Route::get('users/about', 'UsersController@actionAbout');

//RESTful
Route::controller('users', 'UsersController');

//Advance Routing testing
Route::get('tvshow/{show?}/{year?}', function($show = null, $year = null)
{
  if (!$show && !$year)
  {
    return 'You did not pick a show.';
  }
  elseif (!$year)
  {
      return 'You picked the show <strong>' . $show . '</strong>';
  }

  return 'You picked the show <strong>' . $show .'</strong> from the year <em>' . $year . '</em>.';
})
->where('year', '\d{4}');

# /app/routes.php
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});
// ==========todelete
Route::get('/practice', function() {

    $fruit = Array('Apples', 'Oranges', 'Pears');

    echo Pre::render($fruit,'Fruit');

});
// =============todelete pass data from route into view

Route::get('home', function()
{
  $page_title = 'My Home Page Title';
  return View::make('myviews.home')->with('title',$page_title);
});
Route::get('second', function()
{
  $view = View::make('myviews.second');
  $view->my_name = 'John Doe';
  $view->my_city = 'Austin';
  return $view;
});
