<x-casteaching-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Users')}}
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
                            <form data-qa="form_user_create" method="POST">
                                @csrf
                                <div class="shadow sm:rounded-md sm:overflow-hidden md:bg-white">
                                    <div class="px-4 py-5 space-y-6 sm:p-6">

                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700">
                                                Name
                                            </label>
                                            <div class="mt-1">
                                                <input required id="name" type="text" name="name" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2" placeholder="Nom del usuari"></input>
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
                                                <input required id="email" type="email" name="email" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="pepepardo@jeans.com"></input>
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
                                            Crear
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @endcan
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div
            class="block rounded-lg bg-white p-6 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
            <h5 class="mb-2 text-xl font-medium leading-tight">Usuaris</h5>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Superadmin
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$user->id}}
                </th>
                <td class="px-6 py-4">
                    {{$user->name}}
                </td>
                <td class="px-6 py-4">
                    {{$user->email}}
                </td>
                <td class="px-6 py-4">
                    {{$user->superadmin}}
                </td>
                <td class="px-6 py-4">
                    <a href="/manage/users/{{$user->id}}" target="_blank" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <form class="inline" action="/manage/users/{{$user->id}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                           onclick="event.preventDefault();
                            this.closest('form').submit();">Delete</a>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
</x-casteaching-layout>
