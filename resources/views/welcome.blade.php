<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased bg-gray-100">
    <main class="flex flex-col justify-center items-center h-[100vh] w-full">
        <form action="{{route('store-bitlink')}}" method="POST"
            class="flex flex-col justify-center items-center gap-2 rounded-lg p-8 neumorphism-shadow sm:w-1/2 sm:h-1/2">
            <p class="pb-8 text-4xl font-mono">Encurtador</p>
            @csrf
            <div class="flex flex-col items-center gap-4 sm:w-1/2">
                <label for="url" class="w-full text-xs @error('url') text-red-500 @enderror">
                    <input type="text" name="url" placeholder="Https://"
                        class="w-full border border-gray-200 mb-2 px-6 p-4 @error('url')border-red-500 text-red-500 @enderror rounded shadow-lg focus:outline-0 focus:border-transparent focus:shadow-xs">
                    @error('url')
                    {{$message}}
                    @enderror
                </label>
                <input type="submit" value="Encurtar"
                    class="w-1/2 border border-blue-500 text-blue-500 rounded p-2 cursor-pointer hover:bg-blue-500 hover:text-white">
                @if (session('newUrl'))
                <div class="text-center">
                    <p class="text-sm">Seu link encurtado:</p>
                </div>
                <div class="text-center">
                    <a class="text-3xl font-extralight text-blue-500 hover:underline"
                        href="{{env('APP_URL')}}/{{session('newUrl')}}" target="_blank">
                        {{env('APP_URL')}}/{{session('newUrl')}}
                    </a>
                </div>
                @endif
            </div>
        </form>
    </main>
</body>

</html>