<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Subir nueva imagen') }}
       </h2>
   </x-slot>

   <div class="py-6"> 
       <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 bg-white border-b border-gray-200">    
                     <!-- Información operación -->
                     <x-message-status class="mb-4" :status="session('status')" />         
                     <!-- Validation Errors -->
                     <x-auth-validation-errors class="mb-4" :errors="$errors" />
              
                     <form method="POST" action="{{ route('images.store')}}" enctype="multipart/form-data">
                         @csrf
              
                         <!-- Fichero imagen -->
                         <div>
                             <x-label for="image_path" :value="__('Imagen')" />
              
                             <x-input id="image_path" class="block mt-1 w-full" type="file" name="image_path" required autofocus />
                         </div>
              
                         <!-- Descripción -->
                         <div class="mt-4">
                            <x-label for="description" :value="__('Descripción')" />
                            <textarea id="description" name="description" class="w-full h-16 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline"></textarea>
              
                            {{-- <x-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="" required /> --}}
                         </div> 
              
                                                
                         <div class="flex items-center justify-end mt-4">
              
                             <x-button class="ml-4">
                                 {{ __('Subir imagen') }}
                             </x-button>
                         </div>
                     </form>              
               </div>
           </div>
       </div>
   </div>
</x-app-layout>