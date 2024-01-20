<?php

namespace App\Http\Controllers\Account;

use App\Facades\Account\AccountFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use App\Http\Controllers\Controller;
use App\Models\Account\AccountTenant;
use App\Models\Account\AccountUser;
use App\Models\MunaqasatCloud\MunaqasatcloudFreelancer;
use App\Models\MunaqasatCloud\MunaqasatCloudOrganization;
use App\Services\Account\AccountService;

class SigninController extends Controller
{

    // public function __construct(private AccountService $service){}

    public function view(Request $request)
    {
        if (Auth::check()) {
            // User is already signed in, redirect to a different page
            $tenantId = AccountFacade::getTenantId();
            // $name = AccountTenant::find($tenantId);
            // dd($name->label);
            $platform = AccountFacade::getTenantName();
            // dd($platform);
            $foundation = MunaqasatCloudOrganization::find($tenantId);
            $freelancer = MunaqasatcloudFreelancer::find($tenantId);
            if($platform === 'platform'){
                return redirect()->route('dashboard.user')
                ->withSuccess('You have successfully signed in!');
            }elseif($foundation != null  && $foundation->state === 1){ //&& $foundation->stage
                return redirect()->route('dashboard.foundation')
                ->withSuccess('You have successfully signed in!');

            }elseif($freelancer != null){
                return redirect()->route('dashboard.contractor')
                ->withSuccess('You have successfully signed in!');
            }else {
                # code...
                Auth::logout();
                return redirect()->back();
            }

            // return redirect()->route('dashboard.user');
        }
        $register = '1';
        return view('front.account.signin', compact('register'));
    }

   
    public function authenticate(Request $request)
    {
       
        if(AccountFacade::signIn($request->username, $request->password)){
           $request->session()->regenerate();
            $tenantId = AccountFacade::getTenantId();
            $platform = AccountFacade::getTenantName();
           $foundation = MunaqasatCloudOrganization::find($tenantId);
            $freelancer = MunaqasatcloudFreelancer::find($tenantId);
            if($platform === 'platform'){
                return redirect()->route('dashboard.user')
                ->withSuccess('You have successfully signed in!');
            }elseif($foundation != null ){ //&& $foundation->stage
              if($foundation->state === 1){
                return redirect()->route('dashboard.foundation')
                ->withSuccess('You have successfully signed in!');
              }elseif($foundation->state === 0){
                Auth::logout();
                $request = "1";
                return view('front.account.unauthorized', compact('request'));
              }elseif($foundation->state === -1){
                Auth::logout();
                $request = "-1";
                return view('front.account.unauthorized', compact('request'));
              }
               

            }elseif($freelancer != null){
                if($freelancer->state === -1){
                    Auth::logout();
                    $request = "-1";
                    return view('front.account.unauthorized', compact('request'));    
                }elseif($freelancer->state === 1){

                    return redirect()->route('dashboard.contractor')
                    ->withSuccess('You have successfully signed in!');
                }
            }else {
                Auth::logout();
                return redirect()->back();
                
            }
        }
        $register = '2';
        return view('front.account.signin', compact('register'));
    }
}
