<?php

namespace App\Http\Controllers;

use App\Facades\Account\AccountFacade;
use App\Models\Account\AccountTenant;
use App\Models\Account\AccountUser;
use App\Models\MunaqasatCloud\MunaqasatcloudFreelancer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ContractorRegistration extends Controller
{
    //
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
            return view('front.account.signup' ,compact('register') );
        }
        // return view('', compact(['register' => true]));
        

    }
}
