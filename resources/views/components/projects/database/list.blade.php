@props(['project', 'user', 'db' ])

<a href="{{ route("databases.database", ["user" => $user, "project" => $project->id, "database" => $db->id]) }}" class="no-underline group hover:shadow border border-stone-600 rounded">
    <div class="w-full p-4 rounded-lg bg-primary-neutral-light min-h-[120px]">
        <p class="text-lg font-bold group-hover:underline inline-block">{{ $db->database }}</p>
        <span class="inline text-sm">|  {{ \App\Enums\DBDrivers::getDisplayName($db->driver) }}</span>
    </div>
</a>