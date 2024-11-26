@props(['active' => false, "user", "project"])
<x-modal :active="$active">
    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <form action="{{ route('project.databases', ["user" => $user, "project" => $project->id]) }}" method="post">
          @csrf
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="">
                  <div class="mt-3 sm:ml-4 sm:mt-0 sm:text-left">
                    <h3 class="text-lg font-semibold text-gray-900" id="modal-title">Create Project</h3>
                    <div class="w-full my-3">
                      <label for="db_name" class="block text-sm/6 font-medium text-gray-900">Database Name</label>
                      <div class="relative mt-2 rounded-md shadow-sm">
                        <x-input type="text" name="database" id="db_name" required={{ true }} placeholder="Enter database name"></x-input>
                      </div>
                    </div>
                    <div class="w-full my-3">
                      <label for="driver" class="block text-sm/6 font-medium text-gray-900">Database Driver</label>
                      <div class="relative mt-2 rounded-md shadow-sm">
                        <select id="driver" name="driver" class="bg-white block w-full rounded-md border-0 py-1.5 px-7 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                          <option value="mysql">MySQL</option>
                          <option value="pgsql">PgSQL</option>
                        </select>
                      </div>
                    </div>
                    <div class="w-full my-3">
                      <label for="host" class="block text-sm/6 font-medium text-gray-900">Host</label>
                      <div class="relative mt-2 rounded-md shadow-sm">
                        <x-input type="text" name="host" id="host" required={{ true }} placeholder="Enter hostname" value="mysql"></x-input>
                      </div>
                    </div>
                    <div class="w-full my-3">
                      <label for="port" class="block text-sm/6 font-medium text-gray-900">Port Address</label>
                      <div class="relative mt-2 rounded-md shadow-sm">
                        <x-input type="number" name="port" id="port" required={{ true }} placeholder="Enter database name" value="3306"></x-input>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="submit" class="inline-flex w-full justify-center rounded-md bg-primary-action-light px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">Create Database</button>
                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" id="modal-wrapper-close-btn">Cancel</button>
            </div>
        </form>
      </div>
    </div>
</x-modal>