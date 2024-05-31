<x-casteaching-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>
    <div class="mx-auto sm:px-6 lg:px-8 w-full max-w-7xl">
        <x-status></x-status>
        @can('users_manage_create')
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="md:grid md:grid-cols-3 md:gap-6 bg-white md:bg-transparent">
                        <div class="md:col-span-1">
                            <div class="px-4 py-4 sm:px-6 md:px-4">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Usuari</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Informació bàsica de l'usuari
                                </p>
                            </div>
                        </div>
                        <div class="mt-3 md:mt-0 md:col-span-2">
                            <form method="POST" data-qa="form_user_edit">
                                @csrf
                                @method('PUT')
                                <div class="shadow sm:rounded-md sm:overflow-hidden md:bg-white">
                                    <div class="px-4 py-5 space-y-6 sm:p-6">

                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700">
                                                Name
                                            </label>
                                            <div class="mt-1">
                                                <input required id="name" type="text" name="name" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2" value="{{ $user->name }}"></input>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">
                                                Nom de l'usuari
                                            </p>
                                        </div>

                                        <div>
                                            <label for="email" class="block text-sm font-medium text-gray-700">
                                                Email
                                            </label>
                                            <div class="mt-1">
                                                <input required id="email" type="email" name="email" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" value="{{$user->email}}"></input>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">
                                                Email
                                            </p>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3">
                                                <label for="password" class="block text-sm font-medium text-gray-700">
                                                    Password
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input required type="password" name="password" id="password" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Modificar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @endcan
    </div>
</x-casteaching-layout>
