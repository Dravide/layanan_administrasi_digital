<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('nama_template');
            $table->text('data');
            $table->integer('klasifikasi_id');
            $table->enum('status', ['aktif', 'arsip']);
            $table->enum('pilihan', ['aktif', 'nonaktif'])->default('nonaktif');
            $table->text('keterangan')->nullable();
            $table->string('file');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('templates');
    }
};
