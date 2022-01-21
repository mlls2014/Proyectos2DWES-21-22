@isset(Auth::user()->image)
{{-- Para mostrar la imagen podemos usar cualquiera de estas dos técnicas --}}
   {{-- <img class="inline object-cover w-12 h-12 mr-2 rounded-full" src="{{url('user/avatar/' . Auth::user()->image)}}" alt="Profile image"/> --}}
   <img class="inline object-cover w-12 h-12 mr-2 rounded-full" src="{{ route('user.avatar', ['filename'=>Auth::user()->image])}}" alt="Profile image"/>
@endisset 