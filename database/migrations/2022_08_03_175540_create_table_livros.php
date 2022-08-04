<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLivros extends Migration
{

    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pessoas_id');
            $table->string('nome');
            $table->string('categoria');
            $table->string('codigo',10);
            $table->string('autor');
            $table->boolean('ebook');
            $table->string('tamanho_arquivo')->nullable();
            $table->string('peso')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('pessoas_id')->references('id')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
