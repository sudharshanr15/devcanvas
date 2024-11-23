<x-layout>
    <aside>
        <nav>
            <ul>
                <li>
                    <a href="{{ route("project.dashboard", ["user" => $user, "project" => $project]) . "/databases" }}">Databases</a>
                </li>
                <li>
                    <a href="">API Requests</a>
                </li>
                <li>
                    <a href="">File Storage</a>
                </li>
                <li>
                    <a href="">Authentication</a>
                </li>
            </ul>
        </nav>
    </aside>
    <hr>
    <main>
        @yield('main')
    </main>
</x-layout>