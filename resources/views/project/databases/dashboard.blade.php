@extends('project.layout')

@section('main')

<h1>
    Databases
</h1>
<hr>
<div>
    <h2>List</h2>
    <ul>
        @foreach ($userDatabases as $db)
            <li>
                <a href="{{ route("databases.database", ["user" => $user, "project" => $project->id, "database" => $db->id]) }}">{{ $db->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
<hr>
<div>
    <h3>Create new Database</h3>
    <form action="{{ route('project.databases', ["user" => $user, "project" => $project->id]) }}" method="post">
        @csrf

        <div>
            <label for="db_name">Database Name</label>
            <input type="text" name="name" id="db_name" required>
        </div>
        <div>
            <label for="driver">Database Driver</label>
            <select name="driver" id="driver">
                <option value="mysql">Mysql</option>
                <option value="pgsql">PGSQL</option>
            </select>
        </div>
        <div>
            <button type="reset">Reset</button>
            <button type="submit">Submit</button>
        </div>
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
</div>
@endsection