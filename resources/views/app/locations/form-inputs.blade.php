@php $editing = isset($location) @endphp

<div class="flex flex-wrap">
    {{-- <x-inputs.group class="w-full">
        <x-inputs.text
            name="id"
            label="Id"
            :value="old('id', ($editing ? $location->id : ''))"
            maxlength="255"
            placeholder="Id"
            required
        ></x-inputs.text>
    </x-inputs.group> --}}

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $location->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $location->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
