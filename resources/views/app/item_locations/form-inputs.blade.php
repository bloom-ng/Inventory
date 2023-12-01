@php $editing = isset($itemLocation) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select
            name="item_id"
            label="Item"
            :value="old('item_id', ($editing ? $itemLocation->item_id : '1'))"
            maxlength="255"
            placeholder="Item Id"
            required
        >
        @foreach ($items as $item)
            <option {{ $editing && $itemLocation->item_id == $item ->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select
            name="department_id"
            label="Department"
            :value="old('department_id', ($editing ? $itemLocation->department_id : '1'))"
            maxlength="255"
            placeholder="Department Id"
            required
        >
        @foreach ($departments as $department)
            <option {{ $editing && $itemLocation->department_id == $department->id ? 'selected' : '' }} value="{{$department->id}}">{{$department->name}}</option>
        @endforeach
    </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select
            name="location_id"
            label="Location"
            :value="old('location_id', ($editing ? $itemLocation->location_id : '1'))"
            maxlength="255"
            placeholder="Location Id"
            required
        >
        @foreach ($locations as $location)
            <option {{ $editing && $itemLocation->location_id == $location->id ? 'selected' : '' }} value="{{$location->id}}">{{$location->name}}</option>
        @endforeach
    </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="quantity"
            label="Quantity"
            :value="old('quantity', ($editing ? $itemLocation->quantity : ''))"
            max="255"
            placeholder="Quantity"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $itemLocation->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
