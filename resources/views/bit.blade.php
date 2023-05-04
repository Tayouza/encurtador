<x-app-layout>
    <main class="flex flex-col justify-center items-center h-[100vh] w-full">
        <form action="{{route('store-bitlink')}}" method="POST"
            class="flex flex-col bg-zinc-100 justify-center items-center gap-2 rounded-lg py-14 px-8 neumorphism-shadow sm:w-1/2">
            <p class="pb-8 text-4xl font-mono">Encurtador</p>
            @csrf
            <div class="flex flex-col items-center gap-4 sm:w-1/2">
                <label for="path" class="w-full text-xs @error('path') text-red-500 @enderror">
                    <input type="text" name="path" placeholder="caminho (opcional)"
                    class="w-full border border-gray-200 mb-2 px-6 p-4 @error('url')border-red-500 text-red-500 @enderror rounded shadow-lg focus:outline-0 focus:border-transparent focus:shadow-xs">
                    @error('path')
                    {{$message}}
                    @enderror
                </label>
                <label for="url" class="w-full text-xs @error('url') text-red-500 @enderror">
                    <input type="text" name="url" placeholder="Https://"
                    class="w-full border border-gray-200 mb-2 px-6 p-4 @error('url')border-red-500 text-red-500 @enderror rounded shadow-lg focus:outline-0 focus:border-transparent focus:shadow-xs"
                    required>
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
                <div class="text-center relative pb-8">
                    <div id="btnClip" class="absolute top-2 -right-4 w-12 flex flex-col justify-center items-center cursor-pointer duration-200 hover:scale-110">
                        <x-icons.clip class="w-4 fill-gray-500"/>
                        <span id="txtClip" class="text-xs text-gray-500"></span>
                    </div>
                    <a class="text-2xl font-light text-blue-500 p-8 hover:underline"
                        href="{{env('APP_URL')}}/{{session('newUrl')}}" target="_blank">
                        <span id="url">{{env('APP_URL')}}/{{session('newUrl')}}</span>
                    </a>
                </div>
                @endif
            </div>
        </form>
        <script>
            let url = document.querySelector('#url') ?? ''
            let btnClip = document.querySelector('#btnClip') ?? ''
            let txtClip = document.querySelector('#txtClip') ?? ''
            if(btnClip !== ''){
                btnClip.addEventListener('click', () => {
                    navigator.clipboard.writeText(url.innerText)
                    txtClip.innerText = 'copiado!'
                });
            }
        </script>
    </main>
</x-app-layout>