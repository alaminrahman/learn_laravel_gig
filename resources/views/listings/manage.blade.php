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