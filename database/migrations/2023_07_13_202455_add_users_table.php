<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('users', function (Blueprint $table) {
            $table->string('LName')->nullable();
            $table->string('verify')->nullable();
            $table->string('Position')->nullable();
            $table->string('Department')->nullable();
            $table->string('Tel')->nullable();
            $table->string('sendEmail')->nullable();
            $table->string('status_work')->nullable();
            
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
