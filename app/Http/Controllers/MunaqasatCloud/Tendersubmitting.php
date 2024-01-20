<?php

namespace App\Http\Controllers\MunaqasatCloud;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MunaqasatCloud\MunaqasatcloudOrganization;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderApplicant;

class Tendersubmitting extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $organizationId = AccountFacade::getTenantId();
    $TenderSubmit = MunaqasatcloudOrganization::with('tenders.tenderApplicants.freelancer')->find($organizationId);
   
    return view('back.munaqasatmloud.contractors.tenant.index', compact('TenderSubmit'));
   
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
    public function show(string $id)
    {
         $applicantId = $id; // Replace with the actual ID of the desired TenderApplicant
        $applicant = MunaqasatcloudTenderApplicant::with('tender', 'freelancer')->find($applicantId);

        return view('back.munaqasatmloud.contractors.tenant.details', compact('applicant'));
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
         $applicant = MunaqasatcloudTenderApplicant::find($id);
         if((int)$request->status==1)
        //  dd( $request->status);
    // dd($applicant);
        $applicant->update(['status'=>true]);
        
    return redirect()->route('contractors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        MunaqasatcloudTenderApplicant::destroy($id);
        return redirect()->route('contractors.index');
    }
}
