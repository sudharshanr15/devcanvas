@props(['active'])

<div class="{{ ($active == "true" ? "show" : "hidden") . " relative z-10" }}" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="modal-wrapper">
    <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            {{ $slot }}
        </div>
    </div>
</div>