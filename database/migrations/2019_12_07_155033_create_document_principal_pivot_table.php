<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentPrincipalPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_principal', function (Blueprint $table) {
            $table->unsignedBigInteger('document_id')->index();
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->unsignedBigInteger('principal_id')->index();
            $table->foreign('principal_id')->references('id')->on('principals')->onDelete('cascade');
            $table->primary(['document_id', 'principal_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_principal');
    }
}
