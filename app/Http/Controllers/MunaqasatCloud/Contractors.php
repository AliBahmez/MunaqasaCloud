<?php

namespace App\Http\Controllers\MunaqasatCloud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MunaqasatCloud\MunaqasatcloudFreelancer;

class Contractors extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contractors = MunaqasatcloudFreelancer::where('state' ,1)->get();
        $contractorsblock = MunaqasatcloudFreelancer::where('state' ,-1)->get();
        // return $contractors;
        return view('back.munaqasatmloud.contractors.platform.index', compact('contractors','contractorsblock'));
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
        $contractor = MunaqasatcloudFreelancer::find($id);
        return view('back.munaqasatmloud.contractors.platform.details' , compact('contractor'));
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
            
        $freelancer = MunaqasatcloudFreelancer::find($id);
        $freelancer->update($request->all());
        return redirect()->route('contractor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
