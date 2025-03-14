<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

                  <textarea name="message"
                  class="block w-x rounded-md 
                  border-gray-300
                  bg-white shadow-sm 
                  @error('message')border-red-300 @enderror
                  focus:border-indigo-200 
                  focus:ring-red-200
                  focus:ring-opacity-50
                  dark:border-gray-600 
                  dark:bg-gray-800 
                  dark:text-white 
                  dark:focus:border-indigo-300 
                  dark:focus:ring
                  dark:focus:ring-indigo-200
                  focus:rin-capacity-50" 

                  
                  placeholder="{{_('what\'s do you think?')}}">
                {{old('message')}}
                </textarea>
       
                {{-- <input type="text" value="{{old('nombredelcampo')}}"> --}}
                {{-- metodo para ver errores con blade --}}
                {{--    <div class="mt-3">@error('message'){{$message}} @enderror</div>--}}
                {{-- nrtodo para ver errores con tailwind --}}
                <x-input-error :messages="$errors->get('message')" />
                    <x-primary-button class="mt-6">
                        {{_("posting")}}
                    </x-primary-button>
                </form>
               </div>
            </div>
        </div>
    </div>
</x-app-layout> 

