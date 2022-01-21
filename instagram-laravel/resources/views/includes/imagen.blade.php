<div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
   <!-- Article -->
   <article class="overflow-hidden rounded-lg shadow-lg">
      {{-- Imagen --}}
      
         <a href="{{route('images.show', ['image'=>$image->id])}}">
            <img alt="Placeholder" class="object-scale-down h-auto w-full" src="{{ route('image.file', ['filename'=>$image->image_path])}}">
         </a>
      
      {{-- Descripción de la imagen --}}
      <header class="flex items-center justify-between leading-tight p-2 md:p-3">
         <h1 class="text-base">
               <a class="no-underline hover:underline text-black" href="#">
                  {{$image->description}}
               </a>
         </h1>                            
      </header>
      {{-- Usuario que sube la imagen y fecha --}}
      <div class="flex items-center justify-between leading-none p-2 md:p-3">
         <a class="flex items-center no-underline hover:underline text-black" href="{{route('user.profile', ['id'=>$image->user->id])}}">
               <img class="block object-cover w-10 h-10 mr-2 rounded-full" src="{{ route('user.avatar', ['filename'=>$image->user->image])}}" alt="Imagen de perfil"/>
               <p class="ml-2 text-sm">
                  {{$image->user->name . ' ' . $image->user->surname.' | @' . $image->user->nick}}
               </p>
         </a>                                   
         <p class="text-grey-darker text-xs">
            {{-- {{ App\Helpers\FormatTime::LongTimeFilter($image->created_at)}} --}}
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
            <span class="w-6 inset-y-0 right-0 {{$class}} tooltip" data-id="{{$image->id}}">                                                                                                                        
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" >
                  <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                  </svg>                                               
            </span>                                   
            <span class="text-sm mt-1.5 leading-none ml-1 font-bold likes">Likes ({{count($image->likes)}})</span>                                      
         </div>
         <div class="w-1/2 float-right text-right">
           <div class="text-sm mt-1">
             <p class="text-blue font-bold rounded">Comentarios ({{count($image->comments)}})</p>
           </div>
         </div>
       </div>
   </article>
   <!-- END Article -->
</div>