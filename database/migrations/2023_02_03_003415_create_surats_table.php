<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('judul_surat');
            $table->integer('templates_id');
            $table->string('nomor_surat');
            $table->string('titimangsa');
            $table->text('data');
            $table->enum('tte', ['0', '1'])->default('0');
            $table->enum('status', ['aktif', 'arsip'])->default('aktif');
            $table->string('url')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surats');
    }
};
