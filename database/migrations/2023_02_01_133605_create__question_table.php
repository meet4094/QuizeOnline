<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->id();
            $table->text('language_id');
            $table->string('question_name');
            $table->string('answer_A');
            $table->string('answer_B');
            $table->string('answer_C');
            $table->string('answer_D');
            $table->string('correct_answer');
            $table->text('question_image');
            $table->timestamps();
            $table->tinyText('is_del')->default(0)->comment('1 = Deleted, 0 = Active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_question');
    }
};
