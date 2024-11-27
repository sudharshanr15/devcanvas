@props(['active' => false, "user"])
<x-modal :active="$active">
    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <form action="{{ route('user.dashboard', $user) }}" method="post">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="">
                  <div class="mt-3 sm:ml-4 sm:mt-0 sm:text-left">
                    <h3 class="text-lg font-semibold text-slate-200" id="modal-title">Create Project</h3>
                    <div class="w-full my-3">
                      <label for="product_name" class="block text-sm/6 font-medium text-slate-200">Project Name</label>
                      <div class="relative mt-2 rounded-md shadow-sm">
                        <input type="text" name="name" required id="product_name" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-slate-200 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" placeholder="Enter your project name">
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="button" class="inline-flex w-full justify-center rounded-md bg-primary-action-light px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">Create Project</button>
                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-slate-200 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" id="modal-wrapper-close-btn">Cancel</button>
            </div>
        </form>
      </div>
    </div>
</x-modal>