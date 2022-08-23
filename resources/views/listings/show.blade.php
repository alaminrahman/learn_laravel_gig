@php 
    $meta_data = [
        'title' => "Job Show - Job Post Show",
        'author' => "Md. Al-amin",
        'keywords' => "Job Post, Hire Employee, Freelancer",
        'description' => "Hire employee for your company by posting job",
        'publisher' => "Md. Al-amin",
        'copyright' => "Rising Station",
        'pageTopic' => "Media",
        'pageType' => "Blogging",
        'audience' => "Everyone",
        'robots' => "index, follow",
        'ogType' => 'article',     
        'ogImage' => '',
        'ogUrl' => env('APP_URL'),
        'ogSiteName' => 'Job Post and find Job',
    ];
@endphp 

@section('meta_data')
    <title>{{ $meta_data['title'] }}</title>
    <meta name="author" content="{{ $meta_data['author'] }}" />
    <meta name="keywords" content="{{ $meta_data['keywords'] }}" />
    <meta name="description" content="{{ $meta_data['description'] }}" />

    <meta name="publisher" content="{{ $meta_data['publisher'] }}">
    <meta name="copyright" content="{{ $meta_data['copyright'] }}">
    <meta name="page-topic" content="{{ $meta_data['pageTopic'] }}">
    <meta name="page-type" content="{{ $meta_data['pageType'] }}">
    <meta name="audience" content="{{ $meta_data['audience'] }}">
    <meta name="robots" content="{{ $meta_data['robots'] }}">

    <!--Social Meta data-->
    <meta property="og:type" content="{{ $meta_data['ogType'] }}" />
    <meta property="og:title" content="{{ $meta_data['title'] }}" />
    <meta property="og:description" content="{{ $meta_data['description'] }}" />
    <meta property="og:image" content="{{ $meta_data['ogImage'] }}" />
    <meta property="og:url" content="{{ $meta_data['ogUrl'] }}" />
    <meta property="og:site_name" content="{{ $meta_data['ogSiteName'] }}" />
@endsection

<x-page-title :title="$title" />

<x-layout>

    @unless (empty($listing))   

    <a href="{{ url('/') }}" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
        <div class="mx-4">
            <x-card class="p-8">
                <div
                    class="flex flex-col items-center justify-center text-center"
                >
                    <img
                        class="w-48 mr-6 mb-6"
                        src="{{ $listing->logo ? asset('storage/'.$listing->logo) : asset('images/acme.png')}}"
                        alt=""
                    />

                    <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                    <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                    
                    <!--Tags-->
                    <x-listing-tags :tagsCsv="$listing->tags" />

                    <div class="text-lg my-4">
                        <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                    </div>
                    <div class="border border-gray-200 w-full mb-6"></div>
                    <div>
                        <h3 class="text-3xl font-bold mb-4">
                            Job Description
                        </h3>
                        <div class="text-lg space-y-6">
                            <p>{{ $listing->description }}</p>

                            <a
                                href="mailto:{{$listing->email}}"
                                class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-envelope"></i>
                                Contact Employer</a
                            >

                            <a
                                href="{{ $listing->website }}"
                                target="_blank"
                                class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-globe"></i> Visit
                                Website</a
                            >
                        </div>
                    </div>
                </div>
            </x-card>

            @auth
                <x-card class="mt-4 p-2 flex space-x-6">
                    <a href="/listings/{{$listing->id}}/edit"><i class="fa-solid fa-pencil"></i> Edit</a>

                    <form method="post" action="/listings/{{$listing->id}}/delete">
                        @csrf 
                        @method('DELETE')
                        <i class="fa-solid fa-trash"></i> <button type="submit">Delete</button>
                    </form>
                </x-card>
            @endauth
            
        </div>
        @else
        <p>Nothing</p>
    @endunless
    
</x-layout>