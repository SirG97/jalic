<?php


namespace App\Controllers;


use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\Validation;
use App\Models\User;

class SettingsController extends BaseController{
    public function __construct()
    {
        if(!isAuthenticated()){
            Redirect::to('/login');
        }
    }
    public function showSettings(){
        return view('user.settings');
    }

    public function settings(){

    }

    public function change_password(){
        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token)){

                $rules = [
                    'oldpassword' => ['required' => true],
                    'password' => ['required' => true,'minLength' => 6],
                    'cpassword' => ['required' => true,'minLength' => 6]
                ];
                $validation = new Validation();
                $validation->validate($_POST, $rules);
                if($validation->hasError()){
                    $errors = $validation->getErrorMessages();
                    return view('user.settings', ['errors' => $errors]);
                }
                if($request->password !== $request->cpassword){
                    Session::add('error', 'New password and confirm password does not match');
                    return view('user.settings');
                }

                $user  = User::where('user_id', Session::get('SESSION_USER_ID'))->first();
                if($user){
                    if(!password_verify($request->oldpassword, $user->password)){
                        Session::add('error', 'Your old password is not correct');
                        return view('user.settings');
                    }else{
                        $user->password = password_hash($request->password, PASSWORD_BCRYPT);
                        $user->save();
                        Session::add('error', 'Password changed successfully');
                        Redirect::to('/settings');
                    }
                }else{
                    Session::add('error', 'Account does not exist');
                    return view('user.settings');
                }

//                Session::add('success', 'user created successfully');
                Session::add('error', 'An error occured');
                return view('user.settings');

            }
            throw new \Exception('Token mismatch');
        }
    }
}