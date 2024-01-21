<?php

namespace App\Http\Controllers\MunaqasatCloud;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\MunaqasatCloud\MunaqasatcloudFreelancer;
use App\Models\MunaqasatCloud\MunaqasatcloudTender;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderApplicant;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderDocument;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderOffer;
use Illuminate\Http\Request;

class OfferContractor extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $tender = MunaqasatcloudTenderOffer::with()
        $freelancerId = AccountFacade::getTenantId();


    $tendersactive = MunaqasatcloudTender::whereHas('tenderApplicants.tenderOffers', function ($query) use ($freelancerId) {
    $query->where('freelancer_id', $freelancerId);
    })->where('state', 1)->get();
    $tendersfinsh = MunaqasatcloudTender::whereHas('tenderApplicants.tenderOffers', function ($query) use ($freelancerId) {
        $query->where('freelancer_id', $freelancerId);
        })->where('state', 2)->get();
       
   return view('back.munaqasatmloud.offers.contractor.index', compact('tendersactive','tendersfinsh')) ;
  
        
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
    public function show(string $tenderId)
    {
        //
        $freelancerId= AccountFacade::getTenantId();
         $tenderDocuments = MunaqasatcloudTenderDocument::where('tender_id', $tenderId)->get(['technical_title']);
        $tenderDo = MunaqasatcloudTenderDocument::where('tender_id', $tenderId)->get([ 'technical_description']);

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
        $tender = MunaqasatCloudTender::where('id' ,$tenderId)->get();
        $dateOffers = MunaqasatcloudTenderOffer::where('tender_applicant_id', $tenderApplicant->id)
        ->first('created_at');
    
        return view('back.munaqasatmloud.offers.contractor.details',compact('tenderOffers','tenderDocuments' ,'tenderDo','sumoffers','contractor','tender','dateOffers'));

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
