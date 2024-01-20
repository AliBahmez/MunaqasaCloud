<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\Account\AccountFacade;
use App\Models\MunaqasatCloud\MunaqasatcloudFreelancer;
use App\Models\MunaqasatCloud\MunaqasatCloudOrganization;
use App\Models\MunaqasatCloud\MunaqasatCloudTender;

class DashboardController extends Controller
{
    //

    public function dashboard()
    {
        $expiredTenders = MunaqasatcloudTender::get();
        $currentDateTime = now();
        foreach ($expiredTenders as $tender) {
            if ($currentDateTime->isAfter($tender->ending_date)) {
                $tender->state = 2;
            $tender->save();
            }}
        $tenderCount = MunaqasatCloudTender::count();
        $tenderfinsh=MunaqasatCloudTender::where('state', 2)->count(); //'منتهية'
        $tanent=MunaqasatCloudOrganization::count();
        $contractor= MunaqasatcloudFreelancer::count();
        // dd($contractor);
        $contractors=MunaqasatcloudFreelancer::latest()->limit(5)->get();
        $organizations = MunaqasatcloudOrganization::where('state', 0) //'قيد الأعداد'
        ->latest()->limit(5)->get();

    
        // $hasPermission = AccountFacade::hasPermission('become_tenant');
        return view("back.munaqasatmloud.dashboard.platform.platform", compact('contractors','tenderCount','tenderfinsh','tanent','contractor','organizations')); //,compact('hasPermission'));
    }
}
