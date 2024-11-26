@props(['project', 'user', 'db' ])

<a href="{{ route("databases.database", ["user" => $user, "project" => $project->id, "database" => $db->id]) }}" class="no-underline group hover:shadow">
    <div class="w-full p-4 rounded-lg bg-primary-neutral-light min-h-[120px]">
        <p class="text-md font-bold text-gray-900 group-hover:underline">{{ $db->database }}</p>
    </div>
</a>