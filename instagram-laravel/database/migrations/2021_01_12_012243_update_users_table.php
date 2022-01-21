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
         $table->string('role', 20)->after('id')->nullable();
         $table->string('surname', 200)->after('name')->nullable();
         $table->string('nick', 100)->after('surname')->nullable();
         $table->string('image', 255)->after('password')->nullable();
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
         $table->dropColumn('role');
         $table->dropColumn('surname');
         $table->dropColumn('nick');
         $table->dropColumn('image');
      });
   }
}
