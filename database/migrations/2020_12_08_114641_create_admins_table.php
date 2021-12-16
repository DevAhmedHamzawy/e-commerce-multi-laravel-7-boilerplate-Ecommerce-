<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->integer('area_id');
            $table->string('user_name');
            $table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
            $table->string('img')->nullable();
			$table->text('description')->nullable();
            $table->string('email')->unique();
            $table->text('training')->nullable();
            $table->text('services')->nullable();
            $table->text('transporting')->nullable();
            $table->string('blacklist')->default(0);
            $table->string('facebook')->nullable();
            $table->string('googleplus')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('telegram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('linkedin')->nullable();
            $table->boolean('verified')->default(1);
            $table->string('password');	
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
