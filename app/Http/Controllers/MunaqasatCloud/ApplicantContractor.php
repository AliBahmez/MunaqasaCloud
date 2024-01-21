<?php

namespace App\Http\Controllers\MunaqasatCloud;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\MunaqasatCloud\MunaqasatCloudOrganization;
use App\Models\MunaqasatCloud\MunaqasatCloudTender;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderApplicant;
use Illuminate\Http\Request;

class ApplicantContractor extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
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
        $freelancer=AccountFacade::getTenantId();
        //
        $request->validate([
            'voucher' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust as needed
        ]);
      
        if ($request->file('voucher')->isValid()) {
             $image = $request->file('voucher');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('Upload'), $imageName); // Adjust the directory name if needed
             MunaqasatcloudTenderApplicant::create([
                'voucher' =>$imageName,
                'freelancer_id'=>$freelancer,
                'user_id'=>1,
                'tender_id'=>$request->id,
            ]);

            return redirect()->route('tenders.show',  $request->id);

        }

        return redirect()->back()->with('error', 'Image upload failed.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
       
      
       $organizationId = MunaqasatCloudTender::where('id', $id)->value('organization_id');
       $accountnumber = MunaqasatCloudOrganization::where('id', $organizationId)->value('accountnumber');
        // dd($accountnumber);
        return view('back.munaqasatmloud.tenders.contractors.tender.submit', compact('id','accountnumber'));
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
