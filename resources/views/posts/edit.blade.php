<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }} 

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                  <form method="POST" action="{{route('posts.store')}}">
                    @csrf
                    <textarea class="block w-full rounded-md border-gray-300 
                    @error('message') border-red-300 @enderror
                    bg-white shadow-sm focus:border-indigo-200
                     focus:ring focus:ring-red-300 focus:ring-opacity-50 dark: border-gray-600 dark:bg-gray-800 
                    dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200
                    " placeholder="{{__('What\'s do you think?')}}" name="message"> {{old('message', $post->message)}}</textarea>
                    {{-- input type text value {{old('nombredel campo--}}
                    <x-input-error : messages="$errors->get('message')"/>
                        <x-primary-button class="mt-6">
                            {{__("save changes")}}
                        </x-primary-button>
                  </form>
                </div>
            </div>

            <div>
            