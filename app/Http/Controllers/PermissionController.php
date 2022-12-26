<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permission\PermissionIndexRequest;
use App\Http\Requests\Permission\PermissionStoreRequest;
use App\Http\Requests\Permission\PermissionUpdateRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PermissionController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:create permission', ['only' => ['create', 'store']]);
        $this->middleware('permission:read permission', ['only' => ['index', 'show']]);
        $this->middleware('permission:update permission', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete permission', ['only' => ['destroy', 'destroyBulk']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PermissionIndexRequest $request)
    {
        $permissions = Permission::query();
        if ($request->has('search')) {
            $permissions->where('name', 'LIKE', "%" . $request->search . "%");
            $permissions->orWhere('guard_name', 'LIKE', "%" . $request->search . "%");
        }
        if ($request->has(['field', 'order'])) {
            $permissions->orderBy($request->field, $request->order);
        }
        $perPage = $request->has('perPage') ? $request->perPage : 10;
        return Inertia::render('Permission/Index', [
            'title'         => __('app.label.permission'),
            'filters'       => $request->all(['search', 'field', 'order']),
            'perPage'       => (int) $perPage,
            'permissions'   => $permissions->paginate($perPage),
            'breadcrumbs'   => [['label' => __('app.label.permission'), 'href' => route('permission.index')]],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $permission = Permission::create([
                'name'          => $request->name
            ]);
            $superadmin = Role::whereName('superadmin')->first();
            $superadmin->givePermissionTo([$request->name]);
            DB::commit();
            return back()->with('success', __('app.label.created_successfully', ['name' => $permission->name]));
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', __('app.label.created_error', ['name' => __('app.label.permission')]) . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdateRequest $request, Permission $permission)
    {
        DB::beginTransaction();
        try {
            $superadmin = Role::whereName('superadmin')->first();
            $superadmin->revokePermissionTo([$permission->name]);
            $permission->update([
                'name'          => $request->name
            ]);
            $superadmin->givePermissionTo([$permission->name]);
            DB::commit();
            return back()->with('success', __('app.label.updated_successfully', ['name' => $permission->name]));
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', __('app.label.updated_error', ['name' => $permission->name]) . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        DB::beginTransaction();
        try {
            $superadmin = Role::whereName('superadmin')->first();
            $superadmin->revokePermissionTo([$permission->name]);
            $permission->delete();
            DB::commit();
            return back()->with('success', __('app.label.deleted_successfully', ['name' => $permission->name]));
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', __('app.label.deleted_error', ['name' => $permission->name]) . $th->getMessage());
        }
    }

    public function destroyBulk(Request $request)
    {
        try {
            $permission = Permission::whereIn('id', $request->id);
            $permission->delete();
            return back()->with('success', __('app.label.deleted_successfully', ['name' => count($request->id) . ' ' . __('app.label.permission')]));
        } catch (\Throwable $th) {
            return back()->with('error', __('app.label.deleted_error', ['name' => count($request->id) . ' ' . __('app.label.permission')]) . $th->getMessage());
        }
    }
}
