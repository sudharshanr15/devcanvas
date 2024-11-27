@props(['project', 'user'])

<a href="{{ route("project.dashboard", ["user" => $user, "project" => $project->id]) }}" class="no-underline group hover:shadow border border-stone-600 rounded">
    <div class="w-full p-4 rounded-lg bg-primary-neutral-light min-h-[120px]">
        <p class="text-lg font-bold group-hover:underline">{{ $project->name }}</p>
    </div>
</a>