<?php

namespace Modules\SupportDesk\Controllers;

use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('view');

        $permissions = Permission::all();

        return view('SupportDesk::permissions.index', compact('permissions'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|View
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('create');

        return view('SupportDesk::permissions.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create');

        $this->validate($request, [
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
        ]);

        $permission = Permission::create($request->only(['name', 'display_name', 'description']));

        return redirect()->route('supportdesk.admin.permissions.show', [$permission->id]);
    }


    /**
     * Display the specified resource.
     *
     * @param Permission $permission
     *
     * @return \Illuminate\Contracts\View\Factory|View
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Permission $permission): View
    {
        $this->authorize('view', $permission);

        return view('SupportDesk::permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Permission $permission
     *
     * @return \Illuminate\Contracts\View\Factory|View
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Permission $permission): View
    {
        $this->authorize('update', $permission);

        return view('SupportDesk::permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Permission $permission
     *
     * @return \Illuminate\Contracts\View\Factory|View
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Permission $permission): View
    {
        $this->authorize('update', $permission);

        $this->validate($request, [
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
        ]);

        $permission->update($request->only(['name', 'display_name', 'description']));

        return view('SupportDesk::permissions.show', compact('permission'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Permission $permission): RedirectResponse
    {
        $this->authorize('delete', $permission);

        $permission->delete();

        return redirect()->route('supportdesk.admin.permissions.index');
    }
}
