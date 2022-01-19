<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class CourseController extends Controller
{

   private $courses;

   function __construct()
   {
      // parent::__construct();
      $this->courses = Storage::disk('local')->get('cursos.json');
      $this->courses = json_decode($this->courses, true); // Al decodificar el json Los objetos son transformados en arrays asociativos
   }

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return view('courses.index', ['courses' => $this->courses]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('courses.alta')->with('course', null)->with('tipo', 'Alta');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $this->courses[] = [
         "id" => is_null(array_key_last($this->courses)) ? 0 : (array_key_last($this->courses) + 1), // Siempre el id debe ser la key en el array
         "nombre" => $request->input('nombre'),
         "descripcion" => $request->input('descripcion'),
         "precio" => $request->input('precio')
      ];
      return redirect('/cursos');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      return "Mostrando el curso de id $id: " . $this->courses[$id]->nombre . ' ' . $this->courses[$id]->descripcion . ' ' . $this->courses[$id]->precio;
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      return view('courses.alta')->with('tipo', 'Editar')->with('course', $this->courses[$id]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      $this->courses[$id]['nombre'] = $request->input('nombre');
      $this->courses[$id]['descripcion'] = $request->input('descripcion');
      $this->courses[$id]['precio'] = $request->input('precio');
      return redirect('/cursos');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      unset($this->courses["$id"]);
      return redirect('/cursos');
   }

   function __destruct()
   {
      $cursos = json_encode($this->courses);
      $this->courses = Storage::disk('local')->put('cursos.json', $cursos);
   }
}
