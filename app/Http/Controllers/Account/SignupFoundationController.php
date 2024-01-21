<?php

namespace App\Http\Controllers\Account;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\Account\AccountTenant;
use App\Models\Account\AccountUser;
use App\Models\MunaqasatCloud\MunaqasatCloudOrganization;
use App\Notifications\EmailNotification;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignupFoundationController extends Controller
{
    //
    public function view(Request $request)
    {
        if (Auth::check()) {
            // User is already signed in, redirect to a different page
            return redirect()->route('dashboard.user');
        }
        $register = "0";
        return view('front.account.signupfoundation',compact('register'));
    }

    public function store(Request $request){
        $register = "1";
       try {
      
        $username= $request->username;
        $email = $request->email;
        $password = $request->password;
        $tenant_name= $request->username;
        $tenantLable= 'foundation';
       $tanent = AccountFacade::signUpAsTenant($username, $email, $password, $tenant_name,$tenantLable);
       $file = $request->file('trade_document');
        // dd($file);
       if ($file->isValid()) {
           $fileName = time() . '_' . $file->getClientOriginalName();
           $file->move(public_path('uploads'), $fileName); // يتم تعديل اسم المجلد إذا لزم الأمر
       }
       
       $user= MunaqasatCloudOrganization::create(
              [
         'id' => $tanent,
        'name'=>$request->username,
        'title'=>$request->title,
        'contact_statement'=>$request->contact_statement,
        'description'=>$request->description,
        'trade_document'=>$fileName,
        'accountnumber'=>$request->accountnumber,
            ]
        
        );
    
        $request = "1";
        return view('front.account.unauthorized', compact('request'));
       } catch (\Throwable $th) {
        $tanent_id=AccountTenant::find($tanent);
        $tanent_id->delete();
        //throw $th;
       }
       
       return view('front.account.signupfoundation', compact('register'));
        }
}
