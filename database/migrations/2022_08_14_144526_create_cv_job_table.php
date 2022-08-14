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
        Schema::create('cv_job', function (Blueprint $table) {
            $table->foreignId('cv_id')->constrained('cvs');
            $table->foreignId('job_id')->constrained('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cv_job', function (Blueprint $table) {
            //
        });
    }
};
