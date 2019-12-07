<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentMediatypePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_mediatype', function (Blueprint $table) {
            $table->unsignedBigInteger('document_id')->index();
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->unsignedBigInteger('mediatype_id')->index();
            $table->foreign('mediatype_id')->references('id')->on('mediatypes')->onDelete('cascade');
            $table->primary(['document_id', 'mediatype_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_mediatype');
    }
}
