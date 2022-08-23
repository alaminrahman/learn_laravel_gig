@php 
    $meta_data = [
        'title' => "Post a Job - Find your desired Job and Post for hire",
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
    <x-card
        class="p-10 max-w-lg mx-auto mt-24"
    >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a Gig
            </h2>
            <p class="mb-4">Post a gig to find a developer</p>
        </header>

        <form action="/listings" method="post" enctype="multipart/form-data">
            @csrf 

            <div class="mb-6">
                <label
                    for="company"
                    class="inline-block text-lg mb-2"
                    >Company Name</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="company"
                    value="{{ old('company') }}"
                />

                @error('company')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2"
                    >Job Title</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="Example: Senior Laravel Developer"
                    value="{{ old('title') }}"
                />
                @error('title')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="location"
                    class="inline-block text-lg mb-2"
                    >Job Location</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="location"
                    placeholder="Example: Remote, Boston MA, etc"
                    value="{{ old('location') }}"
                />

                @error('location')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Contact Email</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{ old('email') }}"
                />

                @error('email')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="website"
                    class="inline-block text-lg mb-2"
                >
                    Website/Application URL
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="website"
                    value="{{ old('website') }}"
                />

                @error('website')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc"
                    value="{{ old('tags') }}"
                />

                @error('tags')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                />
            </div>

            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Job Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                >{{ old('description') }}</textarea>

                @error('description')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Create Gig
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>