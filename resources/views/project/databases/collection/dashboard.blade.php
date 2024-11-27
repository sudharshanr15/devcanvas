@extends('project.layout')

@section('main')
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">
        Collections
      </h1>
    </div>
</header>
<div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
    <div>
        <div class="flex justify-between mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Collections</h2>
            <button class="bg-primary-action-light text-white rounded px-4 py-2 font-bold" id="modal-wrapper-open-btn">Create Collection</button>
        </div>
        <table class="table-auto">
            <thead>
                <th>
                    <tr>
                        <th>Collection ID</th>
                        <th>Collection Name</th>
                    </tr>
                </th>
            </thead>
            <tbody>
                @foreach ($collections as $collection)
                    <tr>
                        {{-- <x-projects.database-list :user="$user" :project="$project" :db="$db"></x-projects.database-list> --}}
                        <td>
                            <a href="">{{ $collection->id }}</a>
                        </td>
                        <td>
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
        <div class="border-t my-2 py-2">
            <h4 class="font-semibold text-gray-900">Column ${column_count + 1}</h4>
            <div class="w-full my-3">
                <label for="column_name" class="block text-sm/6 font-medium text-gray-900">Column Name</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    <x-input type="text" name="columns[${column_count}][name]" id="column_name" required={{ true }} placeholder="Enter Column name"></x-input>
                </div>
            </div>

            <div class="w-full my-3">
                <label for="column_type" class="block text-sm/6 font-medium text-gray-900">Input Type</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                <select id="column_type" name="columns[${column_count}][type]" class="bg-white block w-full rounded-md border-0 py-1.5 px-7 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
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
                <label for="nullable" class="text-sm/6 font-medium text-gray-900">Nullable</label>
                <input type="checkbox" name="columns[${column_count}][nullable]" id="nullable" value="true">
            </div>

            <div class="w-full my-3">
                <label for="default_value" class="block text-sm/6 font-medium text-gray-900">Default Value</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    <x-input type="text" name="columns[${column_count}][default]" id="default_value" placeholder="Enter Default Value"></x-input>
                </div>
            </div>

            <div class="w-full my-3">
                <input type="checkbox" name="columns[${column_count}][unique]" id="unique" value="true">
                <label for="unique" class="text-sm/6 font-medium text-gray-900">Unique</label>
            </div>

            <div class="w-full my-3">
                <input type="checkbox" name="columns[${column_count}][primary_key]" id="primary_key" value="true">
                <label for="primary_key" class="text-sm/6 font-medium text-gray-900">Primary Key</label>
            </div>

            <div class="w-full my-3">
                <input type="checkbox" name="columns[${column_count}][auto_increment]" id="auto_increment" value="true">
                <label for="auto_increment" class="text-sm/6 font-medium text-gray-900">Auto Increment</label>
            </div>

            <fieldset>
                <legend>Foreign Key</legend>
                <div class="w-full my-3">
                    <label for="foreign_references" class="block text-sm/6 font-medium text-gray-900">References Column</label>
                    <div class="relative mt-2 rounded-md shadow-sm">
                        <x-input type="text" name="columns[${column_count}][foreign_key][references]" id="foreign_references" placeholder=""></x-input>
                    </div>
                </div>

                <div class="w-full my-3">
                    <label for="foreign_on" class="block text-sm/6 font-medium text-gray-900">On Table</label>
                    <div class="relative mt-2 rounded-md shadow-sm">
                        <x-input type="text" name="columns[${column_count}][foreign_key][on]" id="foreign_on" placeholder=""></x-input>
                    </div>
                </div>

                <div class="w-full my-3">
                    <label for="on_delete" class="block text-sm/6 font-medium text-gray-900">On Delete Action</label>
                    <div class="relative mt-2 rounded-md shadow-sm">
                    <select id="on_delete" name="columns[${column_count}][foreign_key][on_delete]" class="bg-white block w-full rounded-md border-0 py-1.5 px-7 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
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