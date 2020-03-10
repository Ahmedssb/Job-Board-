<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class User_cont extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if (Auth::attempt(['email' =>$data['email'], 'password' => $data['password']])) {
               // get the current user 
                $user = Auth::user();
                 // direct the user based on his type 
                 if($user->type == 0){
                 return redirect()->route('PostJob');
                 }elseif($user->type == 1){

                 }else{

                 }
                // return redirect()->route('Home');
                //Session::put('userSession',$data['email']);
              }else{
               return redirect()->back()->with('msg_err','Email or Password is incorrect');
             }        
        }
        return view('User.Login_view');
    }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //check if hte user is already exist
            $userCount = User::where('email',$data['email']) ->where(function ($query) {
                $query->where('type', '=',1)
                      ->orWhere('type', '=',0);
            })->count(); 
             // the above query is  equivalent for select * from users where email = data[email] and (type =1 or type = 0)  
            if($userCount>0){
             return redirect()->back()->with('msg_err','This user is alreay exist');
             }else{
               
               $user =new User();
               $user->name = $data['name'];
               $user->email = $data['email'];
               $user->type = $data['account_type'];
               $user->password = Hash::make($data['pass']);
               $user->save();
               //if the user successfully added on the database redirect to te cart view 
               if (Auth::attempt(['email' =>$data['email'], 'password' => $data['pass']])) {
                 return redirect()->route('Home');
              }  
             }
        }
        return view('User.register_view');
    }

    /*return true if the user loggedin this function will send the return value 
    into the ajax request when user click apply for job button if user not logged in the redirect it to the login page  */
    public function isLogged(){
        if (Auth::check()) {
           echo 'true'; 
        }
        echo 'false';
    }

  public function logout(){
      //clear the authentication information in the user's session
      Auth::logout();
      return redirect()->route('Home');

  }
}
