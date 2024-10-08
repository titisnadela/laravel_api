<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ijins', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->timestamp('waktu_ijin')->nullable()->change();
            $table->string('mesin');
            $table->string('keterangan')->nullable();
            $table->timestamp('waktu_kembali')->nullable()->change();
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
        Schema::dropIfExists('ijins');
    }
}
