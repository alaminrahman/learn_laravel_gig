@php 
    $meta_data = [
        'title' => "Manage - Job Post Manage",
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
    <x-card class="p-10 ">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Gigs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @forelse($listings as $key => $listing)
                    <tr class="border-gray-300">
                        <td>{{ $key+1 }}</td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a href="show.html">
                                {{ $listing->title }}
                            </a>
                        </td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a
                                href="{{ url('/listings/'.$listing->id.'/edit')}}"
                                class="text-blue-400 px-6 py-2 rounded-xl"
                                ><i
                                    class="fa-solid fa-pen-to-square"
                                ></i>
                                Edit</a
                            >
                        </td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <form action="{{ url('/listings/'.$listing->id.'/delete')}}" method="post">
                                @csrf 
                                @method('DELETE')

                                <button type="submit" class="text-red-600">
                                    <i
                                        class="fa-solid fa-trash-can"
                                    ></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty 
                    <tr>
                        <td colspan="3"><p>No data found!</p></td>
                    </tr>
                @endforelse

                
            </tbody>
        </table>

        <div class="mt-2">{{ $listings->links() }}</div>
    </x-card>
</x-layout>