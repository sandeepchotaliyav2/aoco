<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Mail;

class UserController extends Controller
{
    
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.register');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'user_type' => 'required|not_in:0',
        ]);

        if ($validator->fails()) {
            
            return redirect('adduser')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $password = str_random(8);
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password'=>bcrypt($password),
                'user_type' => $request->user_type,
            ]);
           //print_r($password);
           //print_r($data);

            $emailData = array(
                'email'=>$request->email,
                'password'=>$password
                );
            Mail::send('mail', $emailData, function($message) use ($request){
            $message->to($request->email, 'Aoco')->subject
               ('New user created');
            $message->from('sandeep.chotaliya19@gmail.com','Sandeep Chotaliya');
            });

            if (Mail::failures()) {
                echo 'Mail not sent';
            } else {
                //echo 'Mail sent successfully.';
                $request->session()->flash('status', 'User Created successfully.');
                return redirect('home');
            }
        } 
    }

    public function userlist(Request $request){
        $requestData = User::all();
        $requestData['data'] = $requestData->toArray();
        return view('user.list',$requestData);
    }

    public function destroy(Request $request) {
        $id = implode(",", $request->user_id);
        if(User::find($id)->delete()){
            $res['msg'] = "user deleted successfully";
            $res['status'] = "1";
            return json_encode($res);
        }
        
    }
}
