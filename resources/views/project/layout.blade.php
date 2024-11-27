<x-layout>
    <div class="flex">
        <aside class="bg-primary-neutral-dark w-screen md:w-[250px] p-4 h-screen border-e border-stone-600">
            <nav>
                <ul class="flex flex-col">
                    <li class="hover:bg-primary-neutral-dark bg-primary-neutral-dark rounded-lg my-2">
                        <a class="{{'px-4 py-3 inline-block w-full hover:bg-zinc-900 rounded-lg' . (request()->routeIs("project.databases") ? " bg-zinc-900" : "" )}}" href="{{ route("project.dashboard", ["user" => $user, "project" => $project]) . "/databases" }}">Databases</a>
                    </li>
                    <li class="hover:bg-primary-neutral-dark bg-primary-neutral-dark rounded-lg my-2">
                        <a class="{{'px-4 py-3 inline-block w-full hover:bg-zinc-900 rounded-lg' . (request()->routeIs("") ? " bg-zinc-900" : "" )}}" href="">API Requests</a>
                    </li>
                    <li class="hover:bg-primary-neutral-dark bg-primary-neutral-dark rounded-lg my-2">
                        <a class="{{'px-4 py-3 inline-block w-full hover:bg-zinc-900 rounded-lg' . (request()->routeIs("") ? " bg-zinc-900" : "" )}}" href="">File Storage</a>
                    </li>
                    <li class="hover:bg-primary-neutral-dark bg-primary-neutral-dark rounded-lg my-2">
                        <a class="{{'px-4 py-3 inline-block w-full hover:bg-zinc-900 rounded-lg' . (request()->routeIs("") ? " bg-zinc-900" : "" )}}" href="">Authentication</a>
                    </li>
                </ul>
            </nav>
        </aside>
        <section class="flex-grow">
            @yield('main')
        </section>
    </div>
</x-layout>