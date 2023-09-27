<x-app-layout>
    <main class="flex flex-col justify-center items-center h-[100vh] w-full">
        <div class=" bg-zinc-100 gap-2 rounded-lg py-14 px-8 neumorphism-shadow sm:w-1/2">
            <div class="grid grid-cols-4 w-full justify-items-stretch">
            @forelse ($links as $link)
                    <a href="{{ $link->main_url }}" target="_blank" class="hover:underline hover:text-blue-700 justify-self-center">{{ $link->new_url }}</a>
                @empty
                Sem links
                @endforelse
            </div>    
        </div>
    </main>
</x-app-layout>
