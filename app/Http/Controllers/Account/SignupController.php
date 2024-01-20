<?php

namespace App\Http\Controllers\Account;

use App\Facades\Account\AccountFacade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Account\AccountUser;

class SignupController extends Controller
{
    //

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $register = '2';
        return view('front.account.signup' ,compact('register') );
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'username' => 'required|string|max:250',
        //     'email' => 'required|email|max:250|unique:users',
        //     'password' => 'required|min:8|confirmed'
        // ]);


        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $tenantName = $request->tenant;
        $tenantLable = $request->tenant_lable;
        // dd($request->all());
        if($request->has('tenant')) {
            $tenant = $request->tenant;
            AccountFacade::signUpAsTenant($username, $email, $password, $tenant,$tenantLable);
        }else{
            AccountFacade::signUp($username, $email, $password);
        }

        // AccountUser::create([
        //     'username' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)
        // ]);

        // $credentials = $request->only('email', 'password');
        // Auth::attempt($credentials);
        // $request->session()->regenerate();

        return redirect()->route('dashboard.user')
        ->withSuccess('You have successfully signuped & signed in!');
    }
}
