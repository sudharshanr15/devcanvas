@extends('project.layout')

@section('main')
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">
        Databases
      </h1>
    </div>
</header>
<div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
    <div>
        <div class="flex justify-between mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Databases</h2>
            <button class="bg-primary-action-light text-white rounded px-4 py-2 font-bold" id="modal-wrapper-open-btn">Create Database</button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            @foreach ($userDatabases as $db)
                    <x-projects.database.list :user="$user" :project="$project" :db="$db"></x-projects.database.list>
            @endforeach
        </div>
    </div>
</div>
<x-projects.database.modal :active="true" :user="$user" :project="$project"></x-projects.database.modal>
@endsection