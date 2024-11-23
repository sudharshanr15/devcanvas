<x-layout>
    <h1>
        Projects Dashboard
    </h1>
    <hr>
    <div>
        <h2>List</h2>
        <ul>
            @foreach ($projects as $project)
                <li>
                    <a href="{{ route("project.dashboard", ["user" => $user, "project" => $project->id]) }}">{{ $project->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <hr>
    <div>
        <h3>Create new project</h3>
        <form action="{{ route('user.dashboard', $user) }}" method="post">
            @csrf

            <div>
                <label for="project_name">Project Name</label>
                <input type="text" name="name" id="project_name" required>
            </div>
            <div>
                <button type="reset">Reset</button>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</x-layout>