<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controller\Input;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function register()
    {
    	if (auth()->check()) {
			return redirect()->back();
		}

    	return view('layouts.register');
    }

    public function store(Request $request)
    {
        
        $this->validate(request(),[
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        $user = User::create([
                    'email' => $request->get('email'),
                    'password' => Hash::make($request->get('password')),
                ]);

        $email = $request->get('email');


        auth()->login($user);

        return redirect()->to('/');

        // return redirect()->to('/activate_page/'.$email);

    }

    public function activate_page($request)
    {

        if($request){

            return view('layouts.activate')->with('email',$request);
        
        }else{

            $user = auth()->user();

        	return view('layouts.activate')->with('user',$user);
        }
    }

    public function activate($request)
    {
    	$s = User::where('email',$request)->first();
    	$s->is_activate = 1;
    	$s->save();
        return redirect()->to('/');

    }

    public function login()
    {
    	if (auth()->check()) {
			return redirect()->back();
		}
    	return view('layouts.login');
    }

    public function loginSubmit(Request $request)
    {
    	$this->validate(request(),[
    		'email' => 'required|email',
    		'password' => 'required|min:5'
    	]);
 
    	$user = User::where('email',$request->get('email'))->first();

    	if (!$user) {
    		return back()->withErrors(['email'=>'Email not found!']);
    	}

    	$check = Hash::check($request->get('password'),$user->password);

    	if (!$check ) {
    		return back()->withErrors(['password'=>'Password is not valid!']);
    	}
    	

	 	$auth_rule = $request->only('email','password');
	 	
		if ( auth()->attempt($auth_rule)) {		    		
		   	return redirect()->to('/');
		}

		return back()->withErrors(['email'=>'Email/Password is not valid!']);
    }

    public function logout()
    {
    	
    	auth()->logout();

    	return redirect()->to('/login');
    }
}
