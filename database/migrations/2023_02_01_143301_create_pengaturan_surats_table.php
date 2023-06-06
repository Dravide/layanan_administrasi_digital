<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pengaturan_surats', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['header', 'footer']);
            $table->text('isi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengaturan_surats');
    }
};
