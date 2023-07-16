<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNullExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experts', function (Blueprint $table) {
          
            $table->text('exp_problem')->nullable()->change();
            $table->float('exp_area')->nullable()->change();
            $table->float('exp_L0')->nullable()->change();
            $table->float('exp_H')->nullable()->change();
            $table->float('exp_C')->nullable()->change();
            $table->float('exp_tc')->nullable()->change();
            $table->float('exp_returnPeriod')->nullable()->change();
            $table->float('exp_I')->nullable()->change();
            $table->float('exp_maxflow')->nullable()->change();
            $table->text('exp_solution')->nullable()->change();
            $table->float('exp_slope')->nullable()->change();
            $table->text('exp_pixmap')->nullable()->change();
            $table->text('exp_pix1')->nullable()->change();
            $table->text('exp_pix2')->nullable()->change();
            $table->float('exp_a25')->nullable()->change();
            $table->float('exp_b25')->nullable()->change();
            $table->float('exp_a50')->nullable()->change();
            $table->float('exp_b50')->nullable()->change();
            $table->float('exp_solreport')->nullable()->change();
            $table->float('exp_probreport')->nullable()->change();
           

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
