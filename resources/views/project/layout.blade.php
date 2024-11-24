<x-layout>
    <aside class="bg-white w-screen md:w-[250px] p-4 h-screen">
        <nav>
            <ul class="flex flex-col">
                <li class="hover:bg-primary-neutral-dark bg-primary-neutral-dark bg-opacity-80 rounded-lg">
                    <a class="px-2 py-3 inline-block w-full" href="{{ route("project.dashboard", ["user" => $user, "project" => $project]) . "/databases" }}">Databases</a>
                </li>
                <li class="hover:bg-primary-neutral-dark bg-opacity-80 rounded-lg">
                    <a class="px-2 py-3 inline-block w-full" href="">API Requests</a>
                </li>
                <li class="hover:bg-primary-neutral-dark bg-opacity-80 rounded-lg">
                    <a class="px-2 py-3 inline-block w-full" href="">File Storage</a>
                </li>
                <li class="hover:bg-primary-neutral-dark bg-opacity-80 rounded-lg">
                    <a class="px-2 py-3 inline-block w-full" href="">Authentication</a>
                </li>
            </ul>
        </nav>
    </aside>
    <hr>
    <main>
        @yield('main')
    </main>
</x-layout>