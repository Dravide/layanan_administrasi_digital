<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('surats', function (Blueprint $table) {
            $table->date('validated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('surats', function (Blueprint $table) {
            //
        });
    }
};
