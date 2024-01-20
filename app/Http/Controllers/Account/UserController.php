<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\Account\AccountUser;

class UserController extends Controller
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
            'account__manage_users',
            'account__list_users'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        // Fetch users with pagination, where 10 is the number of users per page
        $users = AccountFacade::paginateUsers(1); 
        return view('back.account.users.index', compact('users'));
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
            'account__manage_users',
            'account__add_user'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        // Get tenant permissions only.
        $permissions = AccountFacade::getPermissions();
        return view('back.account.users.create',compact('permissions'));
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
            'account__manage_users',
            'account__add_user'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'label' => 'required',
            // 'description' => 'required',
        ]);

        $user = AccountUser::create($request->all());
        $user->permissions()->sync($request->input('permissions', []));
        return redirect()->route('account.back.users.index')
            ->with('success', 'تم إنشاء الدور بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(int  $user) // show(int $id)
    {
        $permissions = array(
            'account__manage_accounts',
            'account__manage_users',
            'account__show_user'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        $user = AccountUser::find($user);
        // dd($user);
        return view('back.account.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $permissions = array(
            'account__manage_accounts',
            'account__manage_users',
            'account__edit_user'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        // print $id; exit;
        $user = AccountUser::find($id);
        // Get tenant permissions only.
        $permissions = AccountFacade::getPermissions(); 
        return view('back.account.users.edit', compact('user','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $permissions = array(
            'account__manage_accounts',
            'account__manage_users',
            'account__edit_user'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        $request->validate([
            'name' => 'required|max:255|unique:users,name,' . $id,
            'label' => 'required',
            // 'description' => 'required',
        ]);

        $user = AccountUser::find($id)->first();
        // $user->update($request->all());
        $user->update([
            'name' => $request->input('name'),
            'label' => $request->input('label')
        ]);
        $user->permissions()->sync($request->input('permissions', []));

        return redirect()->route('account.back.users.index')
            ->with('success', 'تم تعديل الدور بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        $permissions = array(
            'account__manage_accounts',
            'account__manage_users',
            'account__delete_user'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        $user = AccountUser::find($id)->first();
        // dd($user);
        return view('back.account.users.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $permissions = array(
            'account__manage_accounts',
            'account__manage_users',
            'account__delete_user'
        );
        if (!AccountFacade::hasPermissions($permissions)) {
            return response()->view('errors.403', ['message' => 'ليس لديك الصلاحية لهذا الإجراء.'], Response::HTTP_FORBIDDEN);
        }
        $user = AccountUser::find($id)->first();
        
        $user->delete();

        return redirect()->route('account.back.users.index')
            ->with('success', 'تم حذف الدور بنجاح');
    }
}
