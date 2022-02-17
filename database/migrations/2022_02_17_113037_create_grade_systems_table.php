<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_systems', function (Blueprint $table) {
            $table->id();

            $table->string('grade_name');
            $table->string('grade_point');
            $table->string('start_mark');
            $table->string('end_mark');
            $table->string('start_point');
            $table->string('end_point');
            $table->string('remark');


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
        Schema::dropIfExists('grade_systems');
    }
}
