<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem_details', function (Blueprint $table) {
            $table->char('prob_id', 15)->primary();
            $table->char('blk_id', 15);
            $table->char('prob_cause_id', 15);
            $table->text('prob_cause_type');
            $table->text('prob_level_percent');
            $table->text('prob_level');
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
        Schema::dropIfExists('problem_details');
    }
}
