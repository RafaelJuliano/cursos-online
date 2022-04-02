<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('module_id')->unsigned(); 
            $table->string('title');
            $table->string('description');
            $table->integer('created_by')->unsigned(); 
            $table->timestamps();
        });

        Schema::table('module_contents', function (Blueprint $table) {
            $table->foreign('module_id')->references('id')->on('course_modules');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_contents');
    }
}
