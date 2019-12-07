<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentPublisherPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_publisher', function (Blueprint $table) {
            $table->unsignedBigInteger('document_id')->index();
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->unsignedBigInteger('publisher_id')->index();
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->primary(['document_id', 'publisher_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_publisher');
    }
}
