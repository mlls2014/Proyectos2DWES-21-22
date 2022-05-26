<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('courses', function (Blueprint $table) {
         $table->id();
         $table->string('name');
         $table->unsignedBigInteger('teacher_id');
         $table->foreign('teacher_id')->references('id')->on('users');
         $table->date('start_date');
         $table->date('end_date');
         $table->date('limit_date');  // fecha límite para poder inscribirse en el curso
         $table->integer('lenght'); // duración en horas del curso
         $table->string('description');
         $table->integer('capacity'); // aforo del curso
         $table->double('rate'); // precio del curso
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::drop('courses');
   }
}
