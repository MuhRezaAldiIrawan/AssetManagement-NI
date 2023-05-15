<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProggressjobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proggressjobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained('activities');
            $table->string('user')->nullable();
            $table->string('shift')->nullable();
            $table->string('status')->nullable();
            $table->string('datetime')->nullable();
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
        Schema::dropIfExists('proggressjobs');
    }
}
