@extends('project.layout')

@section('main')
    <h1>Collections</h1>
    <hr>
    <div>
        <h2>List</h2>
        <ul>
            @foreach ($collections as $collection)
                <li>
                    {{ $collection->name }}
                </li>
            @endforeach
        </ul>
    </div>
    <hr>
    <h2>Add</h2>
    <form action="" method="post">
        @csrf

        <div>
            <label for="table_name">Table Name</label>
            <input type="text" name="name" id="table_name" required>
        </div>

        <div>
            <label for="column_name">Column Name</label>
            <input type="text" name="columns[0][name]" id="column_name" required>
        </div>

        <div>
            <label for="column_type">Column Type</label>
            <select name="columns[0][type]" id="column_type" required>
                <option value="string">String</option>
                <option value="integer">Integer</option>
                <option value="text">Text</option>
                <option value="boolean">Boolean</option>
                <option value="float">Float</option>
                <option value="date">Date</option>
                <option value="datetime">Datetime</option>
            </select>
        </div>

        <div>
            <label for="nullable">Nullable</label>
            <input type="checkbox" name="columns[0][nullable]" id="nullable" value="true">
        </div>

        <div>
            <label for="default_value">Default Value</label>
            <input type="text" name="columns[0][default]" id="default_value">
        </div>

        <div>
            <label for="unique">Unique</label>
            <input type="checkbox" name="columns[0][unique]" id="unique" value="true">
        </div>

        <div>
            <label for="primary_key">Primary Key</label>
            <input type="checkbox" name="columns[0][primary_key]" id="primary_key" value="true">
        </div>

        <div>
            <label for="auto_increment">Auto Increment</label>
            <input type="checkbox" name="columns[0][auto_increment]" id="auto_increment" value="true">
        </div>

        <fieldset>
            <legend>Foreign Key</legend>
            <div>
                <label for="foreign_references">References Column</label>
                <input type="text" name="columns[0][foreign_key][references]" id="foreign_references">
            </div>
            <div>
                <label for="foreign_on">On Table</label>
                <input type="text" name="columns[0][foreign_key][on]" id="foreign_on">
            </div>
            <div>
                <label for="on_delete">On Delete Action</label>
                <select name="columns[0][foreign_key][on_delete]" id="on_delete">
                    <option value="">None</option>
                    <option value="cascade">Cascade</option>
                    <option value="set null">Set Null</option>
                </select>
            </div>
        </fieldset>

        <button type="submit">Create Table</button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection