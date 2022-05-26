<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::table('users', function (Blueprint $table) {
         $table->string('nif',9)->after('id')->nullable();
         $table->string('surname')->after('name')->nullable();
         $table->string('telephone',20)->nullable()->after('surname');
         $table->string('address')->after('telephone')->nullable();
         $table->integer('status')->default(0)->after('address');
         $table->string('image')->nullable()->after('status');
        //  $table->unsignedBigInteger('role_id')->after('image')->default(1);
        //  $table->foreign('role_id')->references('id')->on('roles');
         //Esta instrucción equivale a las dos anteriores a excepción del after('image')
         $table->foreignId('role_id')->constrained();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::table('users', function (Blueprint $table) {
         $table->dropForeign(['role_id']);
         $table->dropColumn(['nif', 'surname', 'telephone', 'address', 'status', 'image', 'role_id']);
     });
   }
}
