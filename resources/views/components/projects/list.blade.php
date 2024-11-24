@props(['project', 'user'])

<a href="{{ route("project.dashboard", ["user" => $user, "project" => $project->id]) }}" class="no-underline group hover:shadow">
    <div class="w-full p-4 rounded-lg bg-primary-neutral-light min-h-[120px]">
        <p class="text-md font-bold text-gray-900 group-hover:underline">{{ $project->name }}</p>
    </div>
</a>