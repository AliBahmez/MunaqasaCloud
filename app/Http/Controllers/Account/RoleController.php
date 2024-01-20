<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\Account\AccountPermission;
use App\Models\Account\AccountRole;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = array(
            'account__manage_accounts',
            'account__manage_roles',
            'account__list_roles'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        // Fetch users with pagination, where 10 is the number of users per page
        $roles = AccountFacade::paginateRoles(1); 
        return view('back.account.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = array(
            'account__manage_accounts',
            'account__manage_roles',
            'account__add_role'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        // Get tenant permissions only.
        $permissions = AccountFacade::getPermissions();
        return view('back.account.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permissions = array(
            'account__manage_accounts',
            'account__manage_roles',
            'account__add_role'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        $request->validate([
            'name' => 'required|max:255',
            'label' => 'required',
            // 'description' => 'required',
        ]);

        $role = AccountRole::create([
            'name' => $request->name,
            'label' => $request->label,
            'tenant_id' => AccountFacade::getTenantId(),
        ]);
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('account.back.roles.index')
            ->with('success', 'تم إنشاء الدور بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(int  $role) // show(int $id)
    {
        $permissions = array(
            'account__manage_accounts',
            'account__manage_roles',
            'account__show_role'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        $role = AccountRole::find($role);
        // dd($role);
        return view('back.account.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $permissions = array(
            'account__manage_accounts',
            'account__manage_roles',
            'account__edit_role'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        // print $id; exit;
        $role = AccountRole::find($id);
        // Get tenant permissions only.
        $permissions = AccountPermission::all(); 
        return view('back.account.roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $permissions = array(
            'account__manage_accounts',
            'account__manage_roles',
            'account__edit_role'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        $request->validate([
            'name' => 'required|max:255|unique:roles,name,' . $id,
            'label' => 'required',
            // 'description' => 'required',
        ]);

        $role = AccountRole::find($id)->first();
        // $role->update($request->all());
        $role->update([
            'name' => $request->input('name'),
            'label' => $request->input('label')
        ]);
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('account.back.roles.index')
            ->with('success', 'تم تعديل الدور بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        $permissions = array(
            'account__manage_accounts',
            'account__manage_roles',
            'account__delete_role'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        $role = AccountRole::find($id)->first();
        // dd($role);
        return view('back.account.roles.delete', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $permissions = array(
            'account__manage_accounts',
            'account__manage_roles',
            'account__delete_role'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        $role = AccountRole::find($id)->first();
        
        $role->delete();

        return redirect()->route('account.back.roles.index')
            ->with('success', 'تم حذف الدور بنجاح');
    }
}