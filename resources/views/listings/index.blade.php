@php 
    $meta_data = [
        'title' => "Home - Post a Job and Hire Employee",
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

<x-layout>

    <!-- Hero -->
    @include('partials._hero')

    <!-- Search -->
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4" >           
        
        @unless (count($listings) == 0)        
            @foreach($listings as $listing) 
            
                <!-- Item 1 -->
                <x-listing-card :listing="$listing"/>
                    
                
            @endforeach

            {{ $listings->links() }}
        @else
            <p>Nothing</p>
        @endunless
    </div>
</x-layout>