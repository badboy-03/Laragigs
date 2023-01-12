<x-layout>
    @push('title')
    <title> Laragigs | Home </title>
    @endpush

    @include('partials.hero')

    @include('partials.search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless (count($listings) == 0)
        @foreach ($listings as $listing)
        <x-listing-card :listing="$listing" />
        @endforeach
        @else
        <h1 class="text-center">No Listings Found</h1>
        <h1 class="text-center">No Listings Found</h1>
        @endunless
    </div>
    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>
</x-layout>