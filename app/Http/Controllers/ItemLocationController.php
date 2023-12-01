<?php

namespace App\Http\Controllers;

use App\Models\ItemLocation;
use Illuminate\Http\Request;
use App\Http\Requests\ItemLocationStoreRequest;
use App\Http\Requests\ItemLocationUpdateRequest;
use App\Models\Department;
use App\Models\Item;
use App\Models\Location;

class ItemLocationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ItemLocation::class);

        $search = $request->get('search', '');
        $locations = Location::all();
        $departments = Department::all();
        $items = Item::all();

        $itemLocations = ItemLocation::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.item_locations.index',
            compact('itemLocations', 'locations', 'departments', 'items', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ItemLocation::class);
        $locations = Location::all();
        $departments = Department::all();
        $items = Item::all();

        return view('app.item_locations.create', 
            compact('locations', 'departments', 'items')
        );
    }

    /**
     * @param \App\Http\Requests\ItemLocationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemLocationStoreRequest $request)
    {
        $this->authorize('create', ItemLocation::class);

        $validated = $request->validated();

        $itemLocation = ItemLocation::create($validated);

        return redirect()
            ->route('item-locations.edit', $itemLocation)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemLocation $itemLocation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ItemLocation $itemLocation)
    {
        $this->authorize('view', $itemLocation);

        return view('app.item_locations.show', compact('itemLocation'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemLocation $itemLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ItemLocation $itemLocation)
    {
        $this->authorize('update', $itemLocation);
        $locations = Location::all();
        $departments = Department::all();
        $items = Item::all();

        return view('app.item_locations.edit', 
            compact('itemLocation', 'locations', 'departments', 'items')
        );
    }

    /**
     * @param \App\Http\Requests\ItemLocationUpdateRequest $request
     * @param \App\Models\ItemLocation $itemLocation
     * @return \Illuminate\Http\Response
     */
    public function update(
        ItemLocationUpdateRequest $request,
        ItemLocation $itemLocation
    ) {
        $this->authorize('update', $itemLocation);

        $validated = $request->validated();

        $itemLocation->update($validated);

        return redirect()
            ->route('item-locations.edit', $itemLocation)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemLocation $itemLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ItemLocation $itemLocation)
    {
        $this->authorize('delete', $itemLocation);

        $itemLocation->delete();

        return redirect()
            ->route('item-locations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
