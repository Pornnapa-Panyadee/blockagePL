<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBlockagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blockages', function (Blueprint $table) {
            $table->char('survey_date',150)->nullable();
            $table->char('survey_engineer',150)->nullable();
            $table->char('survey_engineer_position',150)->nullable();
            $table->char('survey_engineer_unit',150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
