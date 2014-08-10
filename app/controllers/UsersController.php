<?php
class  UsersController extends BaseController {

  // public function actionIndex()
  // {
  //   return "This is a User Index page";
  // }
  //
  // public function actionAbout()
  // {
  //   return "This is a User About page";
  // }

  // RESTful - basic
  // public function getIndex()
  // {
  //   $my_form = "<form method='post'>
  //                     <input name='text' value='Testing'>
  //                     <input type='submit'>
  //                     </form>";
  //   return $my_form;
  //
  // }
  // public function postIndex()
  // {
  //   dd(Input::all());
  // }
  //
  // public function getAbout()
  // {
  //    return "This is a User About page";
  // }

// RESTful to CRUD
    public function getIndex()
    {
        $users = User::all();
        return View::make('users.index')->with('users',$users);
    }

    public function getCreate()
    {
        return View::make('users.create');
    }

    public function postCreate()
    {
        $user = new User();
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Input::get('password');
        $user->admin = Input::get('admin');
        $user->save();
        return Redirect::to('users');
    }

    public function getRecord($id)
    {
        $user = User::find($id);
        return View::make('users.record')->with('user',$user);
    }

    public function putRecord()
    {
        $user = User::find(Input::get('user_id'));
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->save();
        return Redirect::to('users');
    }

    public function deleteRecord()
    {
        $user = User::find(Input::get('user_id'))->delete();
        return Redirect::to('users');
    }
}
