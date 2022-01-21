<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('User Configuration') }}
       </h2>
   </x-slot>

   <div class="py-6"> 
       <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">  
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-1 bg-white border-b border-gray-200">   
                  {{-- Información de usuario --}}
                  
                  <div class="container my-6 mx-auto px-4 md:px-12">
                     <div>
                        <div class="bg-gray-100 lg:py-12 lg:flex lg:justify-center rounded ">
                            <div class="bg-white lg:mx-8 lg:flex lg:w-1/2 lg:shadow-lg lg:rounded-lg ">
                                <div class="lg:w-1/2 ">
                                    <div class="h-64 bg-cover lg:rounded-lg lg:h-full" style="background-image:url('{{ route('user.avatar', ['filename'=>$user->image])}}')"></div>
                                </div>
                                <div class="py-12 px-6 max-w-xl lg:max-w-5xl lg:w-1/2">
                                    <h2 class="text-4xl text-gray-800 font-bold">{{ '@' . $user->nick}}</h2>
                                    <p class="mt-4 text-gray-600 text-xl">{{$user->name . ' ' . $user->surname}}</p>
                                    <p class="mt-4 text-gray-600 text-xl">Se unió: {{ FormatTime::LongTimeFilter($user->created_at)}}</p>                                    
                                </div>
                            </div>
                        </div> 
                    </div>
            
                    {{-- Imágenes del usuario --}}
                    <div class="flex flex-wrap -mx-1 lg:-mx-2">             
                       @isset($user->images)
                          @foreach ($user->images as $image)
                             @include('includes.imagen',['image'=>$image])                            
                          @endforeach
                       @endisset
                       </div>
                    </div> 
                 </div>
           </div>
       </div>
   </div>
</x-app-layout>