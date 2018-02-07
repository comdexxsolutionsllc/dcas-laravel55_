<?php

namespace Modules\SupportDesk\Controllers;

use App\Http\Controllers\Controller;
use DCAS\Traits\ApiErrorResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\SupportDesk\Models\Category;

class CategoryController extends Controller
{
    use ApiErrorResponse;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        if (request()->expectsJson()) {
            return Category::all();
        }

        return view('SupportDesk::categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('create');

        return view('SupportDesk::categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Category::create($request->only('name'));

        return redirect()->route('supportdesk.admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Category $category): View
    {
        return view('SupportDesk::categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\SupportDesk\Models\Category $category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category): View
    {
        return view('SupportDesk::categories.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request  $request
     * @param Category $category
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $this->authorize('update', $category);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $category->where('id', $category->id)
            ->update($request->only('name'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     *
     * @return RedirectResponse
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Category $category): RedirectResponse
    {
        $this->authorize('delete', $category);

        $category->where('id', $category->id)
            ->delete();

        return redirect()->route('supportdesk.admin.categories.index');
    }
}
