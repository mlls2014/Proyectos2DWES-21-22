<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Configuración de mi cuenta') }}
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
              
                     <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                         @csrf
              
                         <!-- Name -->
                         <div>
                             <x-label for="name" :value="__('Name')" />
              
                             <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="Auth::user()->name" required autofocus />
                         </div>
              
                         <!-- Surname -->
                         <div class="mt-4">
                            <x-label for="surname" :value="__('Surname')" />
              
                            <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="Auth::user()->surname " required />
                         </div>
              
                         <!-- Nick -->
                         <div class="mt-4">
                            <x-label for="nick" :value="__('Nick')" />
              
                            <x-input id="nick" class="block mt-1 w-full" type="text" name="nick" :value="Auth::user()->nick" required />
                         </div>
              
                         <!-- Email Address -->
                         <div class="mt-4">
                             <x-label for="email" :value="__('Email')" />
              
                             <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="Auth::user()->email" required />
                         </div>
              
                         <!-- Imagen de usuario -->
                         <div class="mt-4">
                           <x-label for="image" :value="__('Imagen')" />
            
                           <x-input id="image" class=" mt-1" type="file" name="image" :value="Auth::user()->image" required />
                           {{-- <img class="inline object-cover w-12 h-12 mr-2 rounded-full" src="{{ route('user.avatar', ['filename'=>Auth::user()->image])}}" alt="Profile image"/> --}}
                           <div class="flex flex-wrap justify-center mt-2">
                              <div class="w-6/12 sm:w-4/12 px-4">
                                 <img src="{{ route('user.avatar', ['filename'=>Auth::user()->image])}}" alt="Imagen de perfil" class="shadow rounded max-w-full h-auto align-middle border-none" />
                              </div>
                           </div>
                         </div>

                         <!-- Password -->
                         <div class="mt-4">
                             <x-label for="password" :value="__('Password')" />
              
                             <x-input id="password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                             required autocomplete="new-password" />
                         </div>
              
                         <!-- Confirm Password -->
                         <div class="mt-4">
                             <x-label for="password_confirmation" :value="__('Confirm Password')" />
              
                             <x-input id="password_confirmation" class="block mt-1 w-full"
                                             type="password"
                                             name="password_confirmation" required />
                         </div>
              
                         <div class="flex items-center justify-end mt-4">
              
                             <x-button class="ml-4">
                                 {{ __('Guardar cambios') }}
                             </x-button>
                         </div>
                     </form>              
               </div>
           </div>
       </div>
   </div>
</x-app-layout>