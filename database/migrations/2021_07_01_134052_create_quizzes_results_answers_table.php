<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesResultsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes_results_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('quizzes_results_id');
            $table->foreign('quizzes_results_id')->references('id')->on('quizzes_results')->onDelete('cascade');
            $table->unsignedInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->unsignedInteger('answer_id');
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
            $table->tinyInteger('correct')->default('0');
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
        Schema::dropIfExists('quizze_results_answers');
    }
}
