<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAttendedClasses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attended_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('created_by')->unsigned();
            $table->integer('content_id')->unsigned();                               
            $table->timestamps();
        }); 
        
        Schema::table('attended_classes', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('content_id')->references('id')->on('module_contents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attended_classes');
    }
}
