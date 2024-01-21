<?php

namespace App\Http\Controllers\MunaqasatCloud;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\MunaqasatCloud\MunaqasatcloudOrganization;
use App\Models\MunaqasatCloud\MunaqasatcloudTender;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderDocument;
use Illuminate\Http\Request;

class Notebook extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    $organizationId = AccountFacade::getTenantId();
        
        // $organization = 1;
        $tendersWithoutDocument = MunaqasatcloudTender::where('organization_id', $organizationId)
        ->whereDoesntHave('tenderDocuments')
        ->get();

        return view('back.munaqasatmloud.tenders.tenant.notebook' , compact('tendersWithoutDocument'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        // return view('tenant.tenders.notebook' );
    }
    public function createnote($id){
        
        return view('back.munaqasatmloud.tenders.tenant.notebook' ,compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $items = $request->input('technical_title');
        $descriptions = $request->input('technical_description');
        $selectedOption = $request->input('item');
        
       
        foreach ($items as $index => $item) {
            $description = $descriptions[$index];
        
            $model = new MunaqasatcloudTenderDocument();
            $model->technical_title = $item;
            $model->technical_description = $description;
            $model->tender_id = $selectedOption;
          
        
            $model->save();
        }
        
        return redirect()->route('notebook.show', $selectedOption);
        }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $tender = MunaqasatcloudTender::find($id);
        $docmuents =MunaqasatcloudTenderDocument::where('tender_id',$id)->orderBy('created_at', 'desc')->get();
        return view('back.munaqasatmloud.tenders.tenant.docmuentdetails' , compact('docmuents','tender'));
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $docmuents =MunaqasatcloudTenderDocument::find($id);
        
        
        return view('back.munaqasatmloud.tenders.tenant.editdocmuent' , compact('docmuents'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
//    $models = MunaqasatcloudTenderDocument::where('tender_id', $id)->get();
   $tender = MunaqasatcloudTenderDocument::find($id);
       $tender_id= $request->tender_id;
   $tender->update($request->all());
    

    return redirect()->route('notebook.show' , $tender_id);
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // dd($id);
        $tender = MunaqasatcloudTenderDocument::where('id', $id)->value('tender_id');
       MunaqasatcloudTenderDocument::find($id)->delete();
    
   

    return redirect()->route('notebook.show', $tender);
    }
}
