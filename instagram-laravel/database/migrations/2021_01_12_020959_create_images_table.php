<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('images', function (Blueprint $table) {
         $table->id();
         // $table->unsignedBigInteger('user_id');
         // $table->foreign('user_id')->references('id')->on('users');
         // Las dos líneas anteriores equivalen a la siguiente
         $table->foreignId('user_id')->constrained();
         $table->string('image_path',255)->nullable();
         $table->text('description')->nullable();
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
      Schema::dropIfExists('images');
   }
}
