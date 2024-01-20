<?php

namespace App\Http\Controllers\Contractor;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\MunaqasatCloud\MunaqasatcloudTender;
use Illuminate\Http\Request;

class MyTender extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $freelancerId = AccountFacade::getTenantId();
      

        $tenders = MunaqasatcloudTender::where('state', 1)
            ->whereHas('tenderApplicants', function ($query) use ($freelancerId) {
                $query->where('freelancer_id', $freelancerId)
                    ->where('status', 0); 
                })
            ->orderBy('created_at', 'desc')
            ->get();
            
            $tendersactive = MunaqasatcloudTender::where('state', 1)
            ->whereHas('tenderDocuments')
            ->whereHas('tenderApplicants', function ($query) use ($freelancerId) {
                $query->where('freelancer_id', $freelancerId)
                    ->where('status', 1);
            })
            ->whereDoesntHave('tenderApplicants.tenderOffers', function ($query) use ($freelancerId) {
                $query->where('freelancer_id', $freelancerId);
            })
            ->orderBy('created_at', 'desc')
            ->get();

                            
            return view('back.munaqasatmloud.tenders.contractors.mytender.index', compact('tenders','tendersactive'));

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
        //
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
