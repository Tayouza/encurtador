<x-app-layout>
    <div class="flex flex-col w-full h-[100vh] items-center justify-center">
        <div class="relative">
            <div class="relative text-center z-50">
                <h1 class="bg-white p-2 rounded text-3xl">{{$error->code}}: {{$error->message}}</h1>
                <a href="/" class="bg-white p-1 rounded text-blue-500 hover:underline">&larr; Voltar ao início</a>
            </div>
            <x-icons.robot-error class="absolute -top-60 -left-20 w-[150%]" />
        </div>
    </div>
</x-app-layout>