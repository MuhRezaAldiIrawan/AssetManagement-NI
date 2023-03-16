<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('kategori_activity');
            $table->date('tanggal');
            $table->string('j_hardware');
            $table->string('u_hardware');
            $table->string('s_aplikasi');
            $table->string('u_aplikasi');
            $table->string('a_it');
            $table->string('u_it');
            $table->string('catatan');
            $table->string('shift');
            $table->string('lokasi');
            $table->string('kategori');
            $table->string('kondisi_akhir');
            $table->string('foto');
            $table->string('status');
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
        Schema::dropIfExists('activities');
    }
}
