<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Image detail') }}
       </h2>
   </x-slot>

   <div class="py-6"> 
       <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">  
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-1 bg-white border-b border-gray-200">
                  <div class="container my-6 mx-auto px-4 md:px-12">

                     <!-- Imagen -->
                     <article class="overflow-hidden rounded-lg shadow-lg mb-6">
                        {{-- Imagen --}}
                        <a href="{{route('images.show', ['image'=>$image->id])}}">
                           <img alt="Placeholder" class="block h-auto w-full" src="{{ route('image.file', ['filename'=>$image->image_path])}}">
                        </a>
                        {{-- Descripción de la imagen --}}
                        <header class="flex items-center justify-between leading-tight p-2 md:p-3">
                           <h1 class="text-base text-xl">
                                 <a class="no-underline hover:underline text-black" href="#">
                                    {{$image->description}}
                                 </a>
                           </h1>                            
                        </header>
                        {{-- Usuario que sube la imagen y fecha --}}
                        <div class="flex items-center justify-between leading-none p-2 md:p-3">
                           <a class="flex items-center no-underline hover:underline text-black" href="{{route('user.profile', ['id'=>$image->user->id])}}">
                                 <img class="block object-cover w-10 h-10 mr-2 rounded-full" src="{{ route('user.avatar', ['filename'=>$image->user->image])}}" alt="Imagen de perfil"/>
                                 <p class="ml-2 text-xl">
                                    {{$image->user->name . ' ' . $image->user->surname.' | @' . $image->user->nick}}
                                 </p>
                           </a>   
                           {{-- Fecha                                 --}}
                           <p class="text-grey-darker text-lg">
                              {{ FormatTime::LongTimeFilter($image->created_at)}}
                           </p>
                        </div>
                        {{-- Likes y botón Comentarios --}}
                        <div class="flex items-center p-2 md:p-3">
                           <div class="w-1/2 flex">
                              {{-- Controlar el color del like --}}
                              <?php
                              $like_propio = $image->likes->first(function ($value){
                                 return $value->user_id == Auth::user()->id;
                              });
                              if (isset($like_propio)){  //Tiene un like propio
                                 $class = "btn-dislike";                                          
                              }else{
                                 $class = "btn-like";   
                              }
                              ?> 
                              <span class=" w-10 inset-y-0 right-0 text-gray-900 {{$class}}" data-id="{{$image->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" >
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                    </svg>
                              </span>                                                               
                              <p class="text-xl mt-3 leading-none ml-1 font-bold likes">Likes ({{count($image->likes)}})</p>
                          </div>
                          <div class="w-1/2 float-right text-right">
                            <div class="text-xl mt-1">
                              <p class="text-blue font-bold rounded">Comentarios ({{count($image->comments)}})</p>
                            </div>
                          </div>
                        </div>
                        {{-- Formulario para insertar comentarios--}}
                        <div class="flex items-center p-2 md:p-3">  
                                                  
                           <form action="{{ route('comments.store')}}" method = "POST" class="w-full bg-white rounded-lg px-1.5 pt-2">
                              @csrf
                              <div class="flex flex-wrap -mx-3 mb-6">
                                 {{-- Importante, para pasar el id de la imagen a comentar. Se podría pasar también en la ruta --}}
                                 <input type="hidden" name="image_id" value="{{$image->id}}" />
                                 <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">{{__('Add a new comment')}}</h2>
                                 <div class="w-full md:w-full px-3 mb-2 mt-2">
                                    <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="content" placeholder='{{__('Type Your Comment')}}' required></textarea>
                                 </div>
                                 <div class="w-full md:w-full flex items-start md:w-full px-3">
                                    <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                                    </div>
                                    <div class="">
                                       {{-- <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='{{__('Post Comment')}}'> --}}
                                       <input type='submit' class="px-4 py-2 bg-gray-800 border border-transparent rounded-md 
                                       font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none 
                                       focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 " value='{{__('Post Comment')}}'>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div class="px-2 md:px-3 "> 
                           <!-- Operación Status -->
                            <!-- Información operación -->
                           <x-message-status class="mb-4" :status="session('status')" />
                           <!-- Validation Errors -->
                           <x-auth-validation-errors class="mb-4" :errors="$errors" /> 
                        </div>
                     </article>
                     <!-- END Imagen -->
                     
                     @foreach ($image->comments()->orderBy('id','desc')->get() as $comment)
                        
                           <div class="flex items-center justify-between leading-none p-1 md:p-2">
                              <div>         
                              {{-- <img class="block object-cover w-10 h-10 mr-2 rounded-full" src="{{ route('user.avatar', ['filename'=>$image->user->image])}}" alt="Imagen de perfil"/> --}}
                              <span class="text-lg text-blue-900 font-bold">
                                 {{$comment->user->name . ' ' . $comment->user->surname.' | @' . $comment->user->nick . ' | '}} 
                              </span>
                              {{-- Fecha                                 --}}
                              <span class="text-grey-darker text-lg">
                                 {{FormatTime::LongTimeFilter($comment->created_at)}}
                              </span>
                              </div>
                              {{-- Mostramos botón borrar comentario si el usuario tiene permisos --}}
                              @if (Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                                 <span class=" w-6 inset-y-0 right-0 text-red-600"> 
                                    <a href="{{route('comments.delete',['id' => $comment->id]) }}">                                         
                                       <svg viewBox="-48 0 407 407" xmlns="http://www.w3.org/2000/svg"><path d="m89.199219 37c0-12.132812 9.46875-21 21.601562-21h88.800781c12.128907 0 21.597657 8.867188 21.597657 21v23h16v-23c0-20.953125-16.644531-37-37.597657-37h-88.800781c-20.953125 0-37.601562 16.046875-37.601562 37v23h16zm0 0"/><path d="m60.601562 407h189.199219c18.242188 0 32.398438-16.046875 32.398438-36v-247h-254v247c0 19.953125 14.15625 36 32.402343 36zm145.597657-244.800781c0-4.417969 3.582031-8 8-8s8 3.582031 8 8v189c0 4.417969-3.582031 8-8 8s-8-3.582031-8-8zm-59 0c0-4.417969 3.582031-8 8-8s8 3.582031 8 8v189c0 4.417969-3.582031 8-8 8s-8-3.582031-8-8zm-59 0c0-4.417969 3.582031-8 8-8s8 3.582031 8 8v189c0 4.417969-3.582031 8-8 8s-8-3.582031-8-8zm0 0"/><path d="m20 108h270.398438c11.046874 0 20-8.953125 20-20s-8.953126-20-20-20h-270.398438c-11.046875 0-20 8.953125-20 20s8.953125 20 20 20zm0 0"/></svg>                                    </a>
                                 </span>
                              @endif
                           </div>
                           <div class="ml-3 mb-3">
                              {{$comment->content}}                            
                           </div>
                        
                        
                        <hr/>
                     @endforeach
                  </div> 
                 </div>
           </div>
       </div>
   </div>
</x-app-layout>
