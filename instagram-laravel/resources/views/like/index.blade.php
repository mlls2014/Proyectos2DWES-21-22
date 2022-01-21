<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Favorite Images') }}
       </h2>
   </x-slot>

   <div class="py-6"> 
       <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">  
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-1 bg-white border-b border-gray-200">
                  <div class="container my-6 mx-auto px-4 md:px-12">
                    <div class="flex flex-wrap -mx-1 lg:-mx-2">             
                       @isset($likes)
                          @foreach ($likes as $like)
                             @include('includes.imagen',['image'=>$like->image])
                          @endforeach
                       @endisset
                       </div>
                       <!-- Paginación -->
                     {{ $likes->links() }} 
                    </div> 
                 </div>
           </div>
       </div>
   </div>
</x-app-layout>
