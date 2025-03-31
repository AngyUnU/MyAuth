<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }} 
            {{-- doble guión bajo es para traducir algo del inglés al español --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- @dump($errors->get('message'))   otra forma de mostrar el error  --}}
                  {{--   {{ __("TO DO: form to posts") }}--}}
                  <form method="POST" action="{{route('posts.store')}}">
                    @csrf
                    {{-- el textarea con name="message" se pasa al PostController en el método store --}}
                    <textarea class="block w-full rounded-md border-gray-300 
                    @error('message') border-red-300 @enderror
                    bg-white shadow-sm focus:border-indigo-200
                     focus:ring focus:ring-red-300 focus:ring-opacity-50 dark: border-gray-600 dark:bg-gray-800 
                    dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200
                    " placeholder="{{__('What\'s do you think?')}}" name="message">
                    {{old('message')}}</textarea>
                    {{-- <input type="text" value="{{old('nombredelcampo')}}"> --}}
                    {{-- Nombre del campo 'message'         $message es el mensaje que esta mostrando al usuario --}}

                    {{-- Método para ver errores con blade --}}
                    {{-- <div class="mt-3">
                        @error('message'){{$message}}@enderror
                    </div> --}}
                    
                    {{-- Método para ver errores con Tailwind --}}
                    {{-- <x-input-error  :messages="$errors->get('nombredelcampo')" /> --}}
                    <x-input-error  :messages="$errors->get('message')" />

                    <x-primary-button class="mt-4">{{__("Posting")}}</x-primary-button>
                  </form>
                </div>
            </div>

            <div>
                    {{-- <p> Aquí van los Post</p> --}}
                    @foreach ($posts as $post)
                    <div class="mt-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                    <div class="p-6 flex space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-9" style="color:white;">
                            <path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0 1 12 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 0 1-3.476.383.39.39 0 0 0-.297.17l-2.755 4.133a.75.75 0 0 1-1.248 0l-2.755-4.133a.39.39 0 0 0-.297-.17 48.9 48.9 0 0 1-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97ZM6.75 8.25a.75.75 0 0 1 .75-.75h9a.75.75 0 0 1 0 1.5h-9a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H7.5Z" clip-rule="evenodd" />
                          </svg>
                          <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>
                                <span class="text-gray-800 dark:text-gray-200">
                                    {{$post->user->name}}</span>
                                <small class="ml-2 text-sm text-gray-600 dark:text-gray-400"> 03-25 16:25:12</small>
                                </div>
                            </div>
                            <p class="mt-4 text-lg text-gray-900 dark:text-gray-100"> 
                                {{$post->created_at->format('d m y h:i a')}}
                              </small>
                          </div>
                    </div>
                </div>
                @endforeach
{{-- Aqui termina los post --}}
            </div>
            <x-dropdown-link :href="route('post.edit',$post->id)"{{__('Edit')}}></x-dropdown-link>

    <x-dropdow-link : href="route('post.edit',$post->id)">{{__('Edit')}}</x-dropdow-link>
    {{-- <form action="{{route('post.destroy',$post->id)}}" method="POST">
        @csrf
    @method('DELETE')
    <x-dropdpown-link : href="route('post.destroy',$post->id)" onclick="event.prevetDefault(); this.closet('from').submit();">
        {{__('Delete')}}
    </x-dropdpown-link>
    </form> --}}
    <div x-data="{show.confirm: false}"> 
        <form id="delete-post-form{{$post->id}}" action="{{route('post.destroy', $post)}}" method="POST">
        @csrf
        @method('DELETE')
         {{-- crear el boton parar abrir el modal  --}}
          <x-dropdpwn-link href="#" x-on:click.stop.prevent=xonfirm>
            {{__('Delete')}}
          </x-dropdpwn-link>

          {{-- diseño de modal para confirmacion --}}

          <div x-show="showConfirm" x-cloak class="fixed inset-0 flex items-center justyfy-center bg-black/50 p-4" x-on:click="show-confirm = false">
            <div class=" bg-with dark:bg-gray-800 p-6 rounded-lg w-60">

                {{-- contenido del modal --}}

                <h3>{{__("Are you sure you want to delete this post?")}}</h3>
          <p>
            <p>
            {{__("this action cannot ve undone")}}
            </div>
                <p class="text-gary-600  dark:text gray-300 ,t-2 text sm"> 
                    {{__('this action cannpt be undone!')}}

                    {{-- botones de confirmacion y cancelacion --}}
                    <div class="mt-4 flex justify-end espace-x-2">
                        <button x-on:click="showConfirm = false"
                         class="px-4 py-2 bg-gray-300 dark:bg-gray-700 dark text-gray-200 rounded hover:bg-gray-400 dark:hover:bg-gray-600">
                        {{__('No, keep it!')}}
                        </button>
                        <button x-on:click="document.getEelementById('delete-post-form-{{$post->id}}').submit()"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                            {{__('Yes, delete it!')}}
                        </button>
        </form>
    </div>
        </div>
    </div>
</x-app-layout>