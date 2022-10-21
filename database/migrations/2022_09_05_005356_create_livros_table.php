<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('autor', 45);
            $table->date('publicacao');
            $table->string('nome', 45);
            $table->string('genero', 45);
            $table->string('categoria', 45);
            $table->timestamp('created_at')->nullable($value = true);
            $table->timestamp('updated_at')->nullable($value = true);
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
};
