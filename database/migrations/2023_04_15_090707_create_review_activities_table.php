<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activities_id')->constrained('activities');
            $table->foreignId('first_review_id')->constrained('users');
            $table->foreignId('second_review_id')->constrained('users');
            $table->string('first_review_value');
            $table->string('second_review_value');
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
        Schema::dropIfExists('review_activities');
    }
}
