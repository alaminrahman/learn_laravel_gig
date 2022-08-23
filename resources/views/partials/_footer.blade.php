<footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
        >
    <p class="ml-2">Copyright &copy; {{ date('Y') }}, All Rights reserved</p>

    <a
        href="/listings/create"
        class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
        >Post Job</a
    >
</footer>

<x-flash-message />