<?php

namespace App\Http\Controllers\MunaqasatCloud;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderApplicant;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderDocument;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenderDocument extends Controller
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
       

            $prices = $request->input('price');
            // print_r($prices); exit;
            $tenderApplicant = $request->input('tenderApplicant');
            $tenderDocument = $request->input('tenderDocument');
            // dd($tenderDocument);
            foreach ($prices as $index => $item) {
                $document = new MunaqasatcloudTenderOffer();
                $document->price= $item;
                $document->tender_applicant_id= $tenderApplicant;
                $document->tender_document_id= $tenderDocument;
                $document->save();
            }
   
            return redirect()->route('mytenders.index')->with('success', 'Tender documents stored successfully!');
       
    }

    /**
     * Display the specified resource.
     */
    public function show( $tender_id)
    {
        //
        // dd($id);
        $freelancer = AccountFacade::getTenantId();

        $tenderApplicant = MunaqasatcloudTenderApplicant::where('tender_id', $tender_id)->where('freelancer_id',$freelancer)->get();
        $tenderDocument = MunaqasatcloudTenderDocument::where('tender_id', $tender_id)->get();
        //  return $tenderDocument;
        return view('back.munaqasatmloud.tenders.contractors.tender.notebook', compact('tenderApplicant','tenderDocument'));
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
