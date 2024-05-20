<x-casteaching-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @can('videos_manage_create')
        <form data-qa="form_video_create" action="" method="POST">
            <label for="title">Title</label>
            <input id="title" name="title" type="text">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
            <label for="url">URL</label>
            <input id="url" name="url" type="text">
            <button>Crear</button>
        </form>
        @endcan
        <div
            class="block rounded-lg bg-white p-6 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
            <h5 class="mb-2 text-xl font-medium leading-tight">Videos</h5>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    URL
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($videos as $video)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$video->id}}
                </th>
                <td class="px-6 py-4">
                    {{$video->title}}
                </td>
                <td class="px-6 py-4">
                    {{$video->description}}
                </td>
                <td class="px-6 py-4">
                    {{$video->url}}
                </td>
                <td class="px-6 py-4">
                    <a href="/videos/{{$video->id}}" target="_blank" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</x-casteaching-layout>
