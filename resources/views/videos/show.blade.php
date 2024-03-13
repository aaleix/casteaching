<x-casteaching-layout>
    <div class="flex flex-col">
        <iframe
            class="md:p-3 lg:p-8 xl:px-10 xl:py-10 2xl:px-20 2xl:py-10"
            height="600"
            src="https://www.youtube.com/embed/ednlsVl-NHA?si=s1leGz3WGJARFrHO"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
        <div class="p-6 lg:p-8 xl:p-10 2xl:p-20">
            {{$video->title}}
        </div>
        <div class="p-6 lg:p-8 xl:p-10 2xl:p-20">
            {{$video->description}}
        </div>
    </div>
</x-casteaching-layout>

