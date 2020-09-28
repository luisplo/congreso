<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('modality');
            $table->unsignedBigInteger('type_document');
            $table->integer('document');
            $table->string('name');
            $table->string('last_name');
            $table->unsignedBigInteger('city');
            $table->string('position');
            $table->string('email');
            $table->string('sena_center')->nullable();
            $table->unsignedBigInteger('main_theme')->nullable();
            $table->string('project_owner')->nullable();
            $table->string('name_project')->nullable();
            $table->string('summary')->nullable();
            $table->unsignedBigInteger('modality_project')->nullable();
            $table->text('url_poster')->nullable();
            $table->string('entity')->nullable();
            $table->string('email_center')->nullable();
            $table->string('university_center')->nullable();
            //KEYS
            $table->foreign('modality')->references('id')->on('modalities');
            $table->foreign('type_document')->references('id')->on('type_documents');
            $table->foreign('city')->references('id')->on('cities');
            $table->foreign('main_theme')->references('id')->on('main_themes');
            $table->foreign('modality_project')->references('id')->on('modality_projects');
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
        Schema::dropIfExists('registers');
    }
}
