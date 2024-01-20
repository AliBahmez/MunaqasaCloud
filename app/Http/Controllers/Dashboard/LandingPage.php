<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MunaqasatCloud\MunaqasatcloudFreelancer;
use App\Models\MunaqasatCloud\MunaqasatCloudOrganization;
use App\Models\MunaqasatCloud\MunaqasatCloudTender;
use Illuminate\Http\Request;

class LandingPage extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    
        $tenderfinsh=MunaqasatCloudTender::where('state', 2)->count();
        $tanent=MunaqasatCloudOrganization::count();
        $contractor= MunaqasatcloudFreelancer::count();
        return view('layouts.index', compact('tenderfinsh','tanent','contractor'));
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
