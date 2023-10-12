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
        Schema::create('sk', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('npp');
            $table->string('jabatan');
            $table->string('status');
            $table->string('file');
            $table->date('tanggal_sk');
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
        Schema::dropIfExists('sk');
    }
};
