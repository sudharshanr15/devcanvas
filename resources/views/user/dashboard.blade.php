<x-layout>
<section class="">
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold tracking-tight text-gray-900">
              Personal Projects
          </h1>
        </div>
    </header>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <div>
            <div class="flex justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Projects</h2>
                <button class="bg-primary-action-light text-white rounded px-4 py-2 font-bold" id="modal-wrapper-open-btn">Create Project +</button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                @foreach ($projects as $project)
                        <x-projects.list :project="$project" :user="$user"></x-projects.list>
                @endforeach
            </div>
        </div>
    </div>
</section>
<x-projects.form-modal active="false" :user="$user"></x-projects.form-modal>
</x-layout>