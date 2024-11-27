<x-layout>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-slate-200">Sign in to your account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="#" method="POST">
            @csrf
            <div class="w-full my-3">
                <x-label for="first_name">First Name</x-label>
                <x-input name="first_name" :required="true" :value="old('first_name')" id="first_name"></x-input>
                <x-form-error name="first_name" />
            </div>
            <div class="w-full my-3">
                <x-label for="last_name">Last Name</x-label>
                <x-input name="last_name" :required="true" :value="old('last_name')" id="last_name"></x-input>
                <x-form-error name="last_name" />
            </div>
            <div class="w-full my-3">
                <x-label for="email">Email</x-label>
                <x-input type="email" name="email" :required="true" :value="old('email')" id="email"></x-input>
                <x-form-error name="email" />
            </div>
            <div class="w-full my-3">
                <x-label for="password">Password</x-label>
                <x-input type="password" name="password" :required="true" :value="old('password')" id="password"></x-input>
                <x-form-error name="password" />
            </div>
            <div class="w-full my-3">
                <x-label for="confirm_password">Confirm Password</x-label>
                <x-input type="password" name="password_confirmation" :required="true" :value="old('password_confirmation')" id="confirm_password"></x-input>
                <x-form-error name="password_confirmation" />
            </div>
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm/6 text-gray-500">
            Not a member?
            <a href="{{ route("register") }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Register</a>
        </p>
    </div>
</div>


</x-layout>