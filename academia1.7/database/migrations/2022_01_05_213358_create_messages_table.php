<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('messages', function (Blueprint $table) {
         $table->id();
        //  $table->unsignedBigInteger('sender_id');
        //  $table->foreign('sender_id')->references('id')->on('users');
         $table->foreignId('sender_id')->constrained('users');
         $table->unsignedBigInteger('recipient_id');
         $table->foreign('recipient_id')->references('id')->on('users');
         $table->text('message');
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
      Schema::drop('messages');
   }
}
