@props(['active' => false])
<x-modal :active="$active">
    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <form action="" method="post">
          @csrf
          <div class="bg-primary-neutral-dark px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="mt-3 sm:ml-4 sm:mt-0 sm:text-left">
                    <h3 class="text-lg font-semibold text-slate-200" id="modal-title">Create Collection/Table</h3>
                    <div class="column-set">
                        <div class="w-full my-3">
                            <label for="table_num" class="block text-sm/6 font-medium text-slate-200">Collection/Table Name</label>
                            <div class="relative mt-2 rounded-md shadow-sm">
                                <x-input type="text" name="name" id="table_name" required={{ true }} placeholder="Enter Collection name"></x-input>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="block w-full bg-primary-neutral-light rounded-md border-0 py-1.5 px-7 text-slate-200 placeholder:text-gray-400 sm:text-sm/6" onclick="addColumn()">+ Add Column</button>
                </div>
            </div>
            <div class="bg-primary-neutral-dark px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="submit" class="inline-flex w-full justify-center rounded-md bg-primary-action-light px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">Create</button>
                <button type="button" class="mt-3 px-3 py-2 text-sm font-semibold sm:mt-0 sm:w-auto" id="modal-wrapper-close-btn">Cancel</button>
            </div>
        </form>
      </div>
    </div>
</x-modal>