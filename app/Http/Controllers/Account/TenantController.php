<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use App\Models\Account\AccountTenant;
//
use App\Facades\Account\AccountFacade;

class TenantController extends Controller
{
    public function index()
    {
        $permissions = array(
            'account__manage_tenants',
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        // Fetch users with pagination, where 10 is the number of users per page
        $tenants = AccountTenant::paginate(1); 
        return view('back.account.tenants.index', compact('tenants'));
    }
}
