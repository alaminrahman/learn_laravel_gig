@props(['listing'])

<x-card >
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{ $listing->logo ? 'storage/'.$listing->logo : asset('images/acme.png')}}"
            alt=""
            width="70"
        />
        <div>
            <h3 class="text-2xl">
                <a href="{{ url('listing/'.$listing->id) }}">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
           <!--Tags-->
           <x-listing-tags :tagsCsv="$listing->tags" />

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
        </div>
    </div>
</x-card>