<?php

namespace App\Http\Controllers\Dashboard;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\MunaqasatCloud\MunaqasatCloudOrganization;
use App\Models\MunaqasatCloud\MunaqasatCloudTender;
use Illuminate\Http\Request;

class ContractorDashboardController extends Controller
{
    //
    public function dashboard()
    {
        $expiredTenders = MunaqasatCloudTender::get();
        $currentDateTime = now();
        foreach ($expiredTenders as $tender) {
            if ($currentDateTime->isAfter($tender->ending_date)) {
                $tender->state = 2;
            $tender->save();
            }}
            
            $freelancerId = AccountFacade::getTenantId();
        
            $tenders = MunaqasatcloudTender::where('state', 1)//'فعالة'
            ->whereDoesntHave('tenderApplicants', function ($query) use ($freelancerId) {
                $query->where('freelancer_id', $freelancerId);
            })
            ->orderBy('created_at', 'desc')->limit(1)->get();
        // dd($tenders);
        // print_r($tender);
        $tendersactive = MunaqasatcloudTender::whereHas('tenderApplicants.tenderOffers', function ($query) use ($freelancerId) {
            $query->where('freelancer_id', $freelancerId);
            })->where('state', 1)->limit(4)->get(); //'فعالة'
        // $hasPermission = AccountFacade::hasPermission('become_tenant');
        return view("back.munaqasatmloud.dashboard.contractor.freelancer", compact('tenders','tendersactive')); //,compact('hasPermission'));
    }
}
