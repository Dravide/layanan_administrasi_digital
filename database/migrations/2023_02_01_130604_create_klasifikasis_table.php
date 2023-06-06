<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('klasifikasis', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('uraian');
$table->string('keterangan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('klasifikasis');
    }
};
