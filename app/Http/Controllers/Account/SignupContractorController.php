<?php

namespace App\Http\Controllers\Account;

use App\Facades\Account\AccountFacade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Account\AccountUser;
use App\Models\MunaqasatCloud\MunaqasatcloudFreelancer;

class SignupContractorController extends Controller
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
        return view('front.account.signupcontractor' ,compact('register') );
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $register ="1";
        try {
            $username= $request->username;
            $email = $request->email;
            $password = $request->password;
            $tenant_name= $request->username;
            $tenantLable= 'contractor';
            $tanent = AccountFacade::signUpAsTenant($username, $email, $password, $tenant_name,$tenantLable);
               MunaqasatcloudFreelancer::create([
                    'id'=>$tanent,
                    'name'=>$request->name,
                    'title'=>$request->title,
                    'description'=>$request->description,
                ]);
                $register ="2";
                return redirect()->route('account.front.signin');
            
        } catch (\Throwable $th) {
            //throw $th;
            $register = "1";
            return view('front.account.signupcontractor' ,compact('register') );
        }
        // return view('', compact(['register' => true]));
        

    }
}
