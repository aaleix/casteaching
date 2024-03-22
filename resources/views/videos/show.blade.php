<x-casteaching-layout>
    <div class="flex flex-col items-center">
        <iframe
            style="height: 75vh;"
            class="md:p-3 lg:p-8 xl:px-10 xl:py-10 2xl:px-20 2xl:py-10 lg:col-span-4 w-full"
            height="600"
            src="https://www.youtube.com/embed/ednlsVl-NHA?si=s1leGz3WGJARFrHO"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>

        <div class="p-3 bg-white rounded-lg shadow-lg">
            <h2 class="p-6 lg:p-8 xl:p-10 2xl:p-20 text-gray-900 uppercase font-semibold text-2xl border-b border-gray-300 border-t-2 border-indigo-400 rounded-t-none">
                {{$video->title}}
            </h2>
            <div class="bg-white py-8 sm:py-12">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                        <div class="mx-auto flex max-w-xs flex-col gap-y-4 p-6 bg-gray-100 rounded-lg">
                            <dt class="text-base leading-7 text-gray-600">Data de publicació</dt>
                            <dd class="order-first text-xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{$video->formatted_published_at}}</dd>
                        </div>
{{--                        <div class="mx-auto flex max-w-xs flex-col gap-y-4">--}}
{{--                            <dt class="text-base leading-7 text-gray-600">Assets under holding</dt>--}}
{{--                            <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">$119 trillion</dd>--}}
{{--                        </div>--}}
{{--                        <div class="mx-auto flex max-w-xs flex-col gap-y-4">--}}
{{--                            <dt class="text-base leading-7 text-gray-600">New users annually</dt>--}}
{{--                            <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">46,000</dd>--}}
{{--                        </div>--}}
                    </dl>
                </div>
            </div>
        </div>

        <div class="p-6 lg:p-8 xl:p-10 2xl:prose-2xl prose truncate">
            {!!Str::markdown($video->description)!!}
        </div>
    </div>
</x-casteaching-layout>

