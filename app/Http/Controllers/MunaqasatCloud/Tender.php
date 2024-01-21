<?php

namespace App\Http\Controllers\MunaqasatCloud;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MunaqasatCloud\MunaqasatcloudTender;

class Tender extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizationId = AccountFacade::getTenantId();
        //
       $UnderPreparation = MunaqasatcloudTender::where('state', 0)->where('organization_id',$organizationId)->get();//'قيد الأعداد'
    $Effective = MunaqasatcloudTender::where('state', 1)->where('organization_id',$organizationId)->get();//'فعالة'
    $Finished = MunaqasatcloudTender::where('state', 2)->where('organization_id',$organizationId)->get();//'منتهية'
    return view('back.munaqasatmloud.tenders.tenant.offers', compact('UnderPreparation' ,'Effective','Finished'));
    // return now()->addHours(3);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('back.munaqasatmloud.tenders.tenant.addtender');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $organizationId = AccountFacade::getTenantId();

    $validatedData = $this->validated($request);

    $tenderData = $request->all();
    $tenderData['organization_id']=$organizationId;
    if (isset($validatedData['participation_price'])) {
        $tenderData['number'] = $validatedData['participation_price'] * 100;
    } else {
        $tenderData['number'] =500;
    }

    MunaqasatcloudTender::create($tenderData);
   
    return redirect()->route('tender.index');

 
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $tender = MunaqasatcloudTender::find($id);
       
    return view('back.munaqasatmloud.tenders.tenant.details' , compact('tender'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tender = MunaqasatcloudTender::find($id);

        return  view('back.munaqasatmloud.tenders.tenant.edittender', compact('tender'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $tender = MunaqasatcloudTender::find($id);
       
       $tender->update($request->all());
        
    return redirect()->route('tender.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // return $id;
    MunaqasatcloudTender::destroy($id);
    return redirect()->route('tender.index');
}

    public function validated(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string',
            'description' => 'required|string',
            // 'state' => 'required',
            'participation_price' => 'required|integer',
            'starting_date' => 'required|date|date_format:Y-m-d|after_or_equal:2024-01-01|before_or_equal:2024-12-31',
            'ending_date' => 'required|date|date_format:Y-m-d|after:starting_date',
            'open_date' => 'required|date|date_format:Y-m-d|after:ending_date',
            'working_location' => 'required',
        ]);
    }

}
