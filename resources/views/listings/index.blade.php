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