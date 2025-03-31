<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Aqui empieza el from post --}}
            <div class="bg-white 
            dark:bg-gray-800 
            overflow-hidden 
            shadow-sm 
            sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                 {{-- __("TO DO: form to post") }}--}}
                 {{-- @dump($errors->get('message')) --}}
                 <form method="POST" action="{{route('post.store')}}">
                        @csrf 
                  <textarea name="message"  class="block w-full 
                  rounded-md 
                  border-gray-300 
                  bg-white shadow-sm 
                  @error('message')border-red-500 @enderror
                focus:border-indigo-200
                focus:ring 
                focus:ring-yellow-200
                focus:ring-opacity-50 
                dark: border-gray-600
                dark:bg-gray-800 
                dark:text-white
                dark:focus:border-indigo-300 
                dark:focus:ring
                dark:focus:ring-indigo-200 
                dark:focus:ring-opacity-50"
            placeholder="{{__('What\'s do you think?')}}">
                {{old('message')}}</textarea>
       
                {{-- <input type="text" value="{{old('nombredelcampo')}}"> --}}
                {{-- metodo para ver errores con blade --}}
                {{--    <div class="mt-3">@error('message'){{$message}} @enderror</div>--}}
                {{-- metodo para ver errores con tailwind --}}
                <x-input-error :messages="$errors->get('message')" />
                    <x-primary-button class="mt-4">{{__("Posting")}}
                    </x-primary-button>
                </form>
               </div>
            </div>
            {{-- aqui termina el formulario --}}
            {{-- Aqui empieza el post  --}}
            <div class="mt-6
            bg-white 
            dark:bg-gray-800 
            shadow-sm 
            rounded-lg
            divide-y
            dark:divide-gray-900">
                <div class="p-6 flex space-x-2"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-2" style="color: white" width="25" height="25">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                  </svg>
                  <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-800
                        dark:text-gray-200">
                         <p>   Nombre del usuario
                        </span>
                        <small class="ml-2
                        text-sm
                        text-gray-600
                        dark:text-gray-400">
                        03-25 16:25:12
                        </small>
                  </div>
                  <p class="mt-4
                  text-lg
                  text-gray-900
                  dark:text-gray-100">
                Esto es un comenatario del usuario
            </p>
                </div>
            </div>
        </div>
    {{-- aqui termina los post --}}
    </div>
</x-app-layout> 

