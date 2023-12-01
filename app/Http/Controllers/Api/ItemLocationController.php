<?php

namespace App\Http\Controllers\Api;

use App\Models\ItemLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemLocationResource;
use App\Http\Resources\ItemLocationCollection;
use App\Http\Requests\ItemLocationStoreRequest;
use App\Http\Requests\ItemLocationUpdateRequest;

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

        $itemLocations = ItemLocation::search($search)
            ->latest()
            ->paginate();

        return new ItemLocationCollection($itemLocations);
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

        return new ItemLocationResource($itemLocation);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemLocation $itemLocation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ItemLocation $itemLocation)
    {
        $this->authorize('view', $itemLocation);

        return new ItemLocationResource($itemLocation);
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

        return new ItemLocationResource($itemLocation);
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

        return response()->noContent();
    }
}
