<?php

namespace App\Http\Controllers\Dashboard;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\MunaqasatCloud\MunaqasatcloudFreelancer;
use App\Models\MunaqasatCloud\MunaqasatCloudOrganization;
use App\Models\MunaqasatCloud\MunaqasatCloudTender;
use Illuminate\Http\Request;

class FoundationDashboardController extends Controller
{
    //
    public function dashboard()
    {
        $expiredTenders = MunaqasatCloudTender::get();
        $currentDateTime = now();
        foreach ($expiredTenders as $tender) {
            if ($currentDateTime->isAfter($tender->ending_date)) {
                $tender->state = 2;//'منتهية'
            $tender->save();
            }}
            $organizationId = AccountFacade::getTenantId();
        $tenderCount = MunaqasatCloudTender::where('organization_id',$organizationId)->count();
        $tenderfinsh=MunaqasatCloudTender::where('state', 2)->where('organization_id',$organizationId)->count(); //'منتهية'
        $tenderactive=MunaqasatCloudTender::where('state', 1)->where('organization_id',$organizationId)->count(); //'فعالة'
        $tenderstart=MunaqasatCloudTender::where('state', 0)->where('organization_id',$organizationId)->count(); //'قيد الأعداد'
       
        // dd($contractor);
        $tender=MunaqasatCloudTender::latest()->limit(5)->where('organization_id',$organizationId)->where('state', 0)->get(); //'قيد الأعداد'
        
        
        $TenderSubmit = MunaqasatcloudOrganization::with('tenders.tenderApplicants.freelancer')->find($organizationId);
    
        // $hasPermission = AccountFacade::hasPermission('become_tenant');
        return view("back.munaqasatmloud.dashboard.tenant.tenant", compact('TenderSubmit','tenderCount','tenderfinsh','tenderactive','tenderstart','tender')); //,compact('hasPermission'));
    }
}
