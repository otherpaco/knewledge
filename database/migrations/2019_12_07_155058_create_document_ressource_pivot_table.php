<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentRessourcePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_ressource', function (Blueprint $table) {
            $table->unsignedBigInteger('document_id')->index();
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->unsignedBigInteger('ressource_id')->index();
            $table->foreign('ressource_id')->references('id')->on('ressources')->onDelete('cascade');
            $table->primary(['document_id', 'ressource_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_ressource');
    }
}
