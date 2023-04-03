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
            $table->string('j_hardware')->nullable();
            $table->text('u_hardware')->nullable();
            $table->string('s_aplikasi')->nullable();
            $table->text('u_aplikasi')->nullable();
            $table->string('a_it')->nullable();
            $table->text('u_it')->nullable();
            $table->text('catatan')->nullable();
            $table->string('shift');
            $table->string('lokasi');
            $table->string('kategori');
            $table->text('kondisi_akhir')->nullable();
            $table->string('biaya');
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
