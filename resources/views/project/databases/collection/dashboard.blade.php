@extends('project.layout')

@section('main')
<header class="bg-primary-neutral-light shadow border-b border-stone-600">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight">
            Collections
        </h1>
    </div>
</header>
<div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
    <div>
        <div class="flex justify-between mb-8">
            <h2 class="text-3xl font-bold text-slate-200">Collections</h2>
            <button class="bg-primary-action-light text-white rounded px-4 py-2 font-bold" id="modal-wrapper-open-btn">Create Collection</button>
        </div>
        <table class="border border-collapse bg-primary-neutral-light border-stone-600 w-full text-white">
            <thead class="bg-primary-neutral-dark">
                <th>
                    <tr>
                        <th class="w-1/2 border border-stone-600 font-semibold p-4 text-left">Collection ID</th>
                        <th class="w-1/2 border border-stone-600 font-semibold p-4 text-left">Collection Name</th>
                    </tr>
                </th>
            </thead>
            <tbody>
                @foreach ($collections as $collection)
                    <tr>
                        {{-- <x-projects.database-list :user="$user" :project="$project" :db="$db"></x-projects.database-list> --}}
                        <td class="border border-stone-600 p-4">
                            <a href="">{{ $collection->id }}</a>
                        </td>
                        <td class="border border-stone-600 p-4">
                            <a href="">{{ $collection->name }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<script>
    let column_count = 0;
    function addColumn(){
        $(".column-set").append(`
        <div class="border-t border-stone-600 my-2 py-2">
            <h4 class="font-semibold text-slate-200">Column ${column_count + 1}</h4>
            <div class="w-full my-3">
                <label for="column_name" class="block text-sm/6 font-medium text-slate-200">Column Name</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    <x-input type="text" name="columns[${column_count}][name]" id="column_name" required={{ true }} placeholder="Enter Column name"></x-input>
                </div>
            </div>

            <div class="w-full my-3">
                <label for="column_type" class="block text-sm/6 font-medium text-slate-200">Input Type</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                <select id="column_type" name="columns[${column_count}][type]" class="block w-full bg-primary-neutral-light rounded-md border-0 py-1.5 px-7 text-slate-200 ring-1 ring-inset ring-stone-600 placeholder:text-gray-400 sm:text-sm/6">
                    <option value="string">String</option>
                    <option value="integer">Integer</option>
                    <option value="text">Text</option>
                    <option value="boolean">Boolean</option>
                    <option value="float">Float</option>
                    <option value="date">Date</option>
                    <option value="datetime">Datetime</option>
                </select>
                </div>
            </div>

            <div class="w-full my-3">
                <input type="checkbox" name="columns[${column_count}][nullable]" id="nullable" value="true">
                <label for="nullable" class="text-sm/6 font-medium text-slate-200">Nullable</label>
            </div>

            <div class="w-full my-3">
                <label for="default_value" class="block text-sm/6 font-medium text-slate-200">Default Value</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    <x-input type="text" name="columns[${column_count}][default]" id="default_value" placeholder="Enter Default Value"></x-input>
                </div>
            </div>

            <div class="w-full my-3">
                <input type="checkbox" name="columns[${column_count}][unique]" id="unique" value="true">
                <label for="unique" class="text-sm/6 font-medium text-slate-200">Unique</label>
            </div>

            <div class="w-full my-3">
                <input type="checkbox" name="columns[${column_count}][primary_key]" id="primary_key" value="true">
                <label for="primary_key" class="text-sm/6 font-medium text-slate-200">Primary Key</label>
            </div>

            <div class="w-full my-3">
                <input type="checkbox" name="columns[${column_count}][auto_increment]" id="auto_increment" value="true">
                <label for="auto_increment" class="text-sm/6 font-medium text-slate-200">Auto Increment</label>
            </div>

            <fieldset>
                <legend>Foreign Key</legend>
                <div class="w-full my-3">
                    <label for="foreign_references" class="block text-sm/6 font-medium text-slate-200">References Column</label>
                    <div class="relative mt-2 rounded-md shadow-sm">
                        <x-input type="text" name="columns[${column_count}][foreign_key][references]" id="foreign_references" placeholder=""></x-input>
                    </div>
                </div>

                <div class="w-full my-3">
                    <label for="foreign_on" class="block text-sm/6 font-medium text-slate-200">On Table</label>
                    <div class="relative mt-2 rounded-md shadow-sm">
                        <x-input type="text" name="columns[${column_count}][foreign_key][on]" id="foreign_on" placeholder=""></x-input>
                    </div>
                </div>

                <div class="w-full my-3">
                    <label for="on_delete" class="block text-sm/6 font-medium text-slate-200">On Delete Action</label>
                    <div class="relative mt-2 rounded-md shadow-sm">
                    <select id="on_delete" name="columns[${column_count}][foreign_key][on_delete]" class="block w-full bg-primary-neutral-light rounded-md border-0 py-1.5 px-7 text-slate-200 ring-1 ring-inset ring-stone-600 placeholder:text-gray-400 sm:text-sm/6">
                        <option value="">None</option>
                        <option value="cascade">Cascade</option>
                        <option value="set null">Set Null</option>
                    </select>
                    </div>
                </div>
            </fieldset>
        </div>
    `)
    column_count++
    }
</script>
<x-projects.database.collection.form-modal :active="false"></x-projects.database.collection.form-modal>
@endsection