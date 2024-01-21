<?php

namespace App\Http\Controllers\MunaqasatCloud;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\MunaqasatCloud\MunaqasatcloudOrganization;
use App\Models\MunaqasatCloud\MunaqasatCloudTender;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderApplicant;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderDocument;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenderOffer extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        
        $organizationId = AccountFacade::getTenantId();
        $organization = MunaqasatcloudOrganization::with(['tenders' => function ($query) { //'فعالة'
            $query->where('state', 1)->with(['tenderApplicants.freelancer', 'tenderApplicants.tenderOffers']);
        }])->find($organizationId);

        $organizationfinish = MunaqasatcloudOrganization::with(['tenders' => function ($query) {
            $query->where('state', 2)->with(['tenderApplicants.freelancer', 'tenderApplicants.tenderOffers']);
        }])->find($organizationId);

        // dd( $organization);
            return view('back.munaqasatmloud.offers.tenant.index', compact('organization', 'organizationfinish'));

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
    public function show(string $tender_id)
    {
        
      }

    /**
     * Show the form for editing the specified resource.
     */
    public function showoffers($tenderId, $freelancerId)
    {
        // return $tenderId . $freelancerId;
        $tenderDocuments = MunaqasatcloudTenderDocument::where('tender_id', $tenderId)->get(['technical_title']);
       $tenderDo = MunaqasatcloudTenderDocument::where('tender_id', $tenderId)->get([ 'technical_description']);
       $tender = MunaqasatCloudTender::where('id' ,$tenderId)->get();

       $tenderApplicant = MunaqasatcloudTenderApplicant::where('tender_id', $tenderId)
       ->where('freelancer_id', $freelancerId)
       ->first();
       $tenderOffers = MunaqasatcloudTenderOffer::where('tender_applicant_id', $tenderApplicant->id)
       ->pluck('price');
       $sumoffers = MunaqasatcloudTenderOffer::where('tender_applicant_id', $tenderApplicant->id)
       ->sum('price');
       $contractor = MunaqasatcloudTenderApplicant::with('freelancer')
       ->where('id', $tenderApplicant->id)
       ->first();
       $dateOffers = MunaqasatcloudTenderOffer::where('tender_applicant_id', $tenderApplicant->id)
       ->first('created_at');
       return view('back.munaqasatmloud.offers.tenant.details',compact('tenderOffers','tenderDocuments' ,'tenderDo','sumoffers','contractor','tender','dateOffers') );
    }
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
