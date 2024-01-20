<?php

namespace App\Http\Controllers\MunaqasatCloud;

use App\Http\Controllers\Controller;
use App\Mail\InstitutionAcceptance;
use App\Models\Account\AccountUser;
use App\Models\MunaqasatCloud\MunaqasatcloudOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Organization extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $organizations = MunaqasatcloudOrganization::where('state', 0)->get();
    $Effective = MunaqasatcloudOrganization::where('state', 1)->get();
    $Blocked = MunaqasatcloudOrganization::where('state', -1)->get();
    return view('back.munaqasatmloud.foundation.foundation', compact('organizations' ,'Effective','Blocked'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
{
    $organization = MunaqasatcloudOrganization::find($id);
    return view('back.munaqasatmloud.foundation.deteails' , compact('organization'));
    // return  $organization;
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $user_email = AccountUser::where('tenant_id', $id)->value('email');
          $organization = MunaqasatcloudOrganization::find($id);
        $organization->update($request->all());
         Mail::to($user_email)->send(new InstitutionAcceptance($organization->title));
    return redirect()->route('foundations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function Effective($id) {
        $organization = MunaqasatcloudOrganization::where('state', 1)->get();//'فعالة'
        return view('back.munaqasatmloud.foundations.details', compact('organization'));
    }
    
}
