<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuthorDocumentPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_document', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->index();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->unsignedBigInteger('document_id')->index();
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->primary(['author_id', 'document_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_document');
    }
}
