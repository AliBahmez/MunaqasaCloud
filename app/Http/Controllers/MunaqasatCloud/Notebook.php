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
        
        // Loop through the inputs and store them in the database
        foreach ($items as $index => $item) {
            $description = $descriptions[$index];
        
            $model = new MunaqasatcloudTenderDocument();
            $model->technical_title = $item;
            $model->technical_description = $description;
            $model->tender_id = $selectedOption;
            // Assign other form data to the model's properties
        
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
        // return $docmuent;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // $organization = 1;
        // $tenderactive = MunaqasatcloudTender::find($id);
        
        // $tendersWithoutDocument = MunaqasatcloudTender::where('organization_id', $organization)
        // ->whereDoesntHave('tenderDocuments')
        // ->get();
        $docmuents =MunaqasatcloudTenderDocument::find($id);
        
        // return $docmuents;
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
    // $items = $request->input('technical_title');
    // $descriptions = $request->input('technical_description');
    // $selectedOption = $request->input('tender_id');

    // dd($selectedOption);
    // foreach ($models as $index => $model) {
    //     $model->technical_title = $items[$index];
    //     $model->technical_description = $descriptions[$index];
    //     $model->tender_id = $selectedOption;

    //     // Save the updated model
    //     $model->save();
    // }

    return redirect()->route('notebook.show' , $tender_id);
}
// public function update(Request $request, string $id)
// {
//     $items = $request->input('technical_title');
//     $descriptions = $request->input('technical_description');
//     $selectedOption = $request->input('item');

//     $models = MunaqasatcloudTenderDocument::where('tender_id', $id)->get();

//     foreach ($items as $index => $item) {
//         // Get the specific model from the collection using index
//         $currentModel = $models->get($index);

//         if ($currentModel) {
//             // If the model exists, update it
//             $currentModel->technical_title = $item;
//             $currentModel->technical_description = $descriptions[$index];
//             $currentModel->tender_id = $selectedOption;
//             $currentModel->save();
//         } else {
//             // If the model doesn't exist, create a new one
//             MunaqasatcloudTenderDocument::create([
//                 'tender_id' => $selectedOption,
//                 'technical_title' => $item,
//                 'technical_description' => $descriptions[$index],
//             ]);
//         }
//     }

//     return redirect()->route('notebook.create');
// }




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
