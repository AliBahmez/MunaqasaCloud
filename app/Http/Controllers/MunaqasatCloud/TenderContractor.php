<?php

namespace App\Http\Controllers\MunaqasatCloud;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\MunaqasatCloud\MunaqasatcloudTender;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderApplicant;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderOffer;
use Illuminate\Http\Request;

class TenderContractor extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $freelancerId = AccountFacade::getTenantId();


        $tenders = MunaqasatcloudTender::where('state', 1)//'فعالة'
            ->whereDoesntHave('tenderApplicants', function ($query) use ($freelancerId) {
                $query->where('freelancer_id', $freelancerId);
            })
            ->orderBy('created_at', 'desc')
            ->get(); return view('back.munaqasatmloud.tenders.contractors.tender.index', compact('tenders'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
      return view('back.freelancer.tenders.details');
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
        //
        $freelancerId = AccountFacade::getTenantId();
        ;
        $tender = MunaqasatcloudTender::find($id);
        $tenderApplicant = MunaqasatcloudTenderApplicant::where('tender_id', $id)
        ->where('freelancer_id', $freelancerId)
        ->first();
        
        $tenderOffers = MunaqasatcloudTenderOffer::whereHas('tenderApplicant', function ($query) use ($freelancerId, $id) {
            $query->where('freelancer_id', $freelancerId)
            ->where('tender_id', $id);
        })->get();
        
        return view('back.munaqasatmloud.tenders.contractors.tender.details',compact('tender','tenderApplicant','tenderOffers'));
        
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
