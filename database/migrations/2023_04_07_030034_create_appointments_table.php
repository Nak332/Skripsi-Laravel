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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('employee_id')->nullable();
            $table->integer('antrian_number');
            $table->string('appointment_type');
            $table->string('complaint');
            $table->integer('height') ->nullable();
            $table->integer('weight') ->nullable();
            $table->float('body_temperature', 5, 2)->nullable();
            $table->integer('pulse') ->nullable();
            $table->float('blood_sugar', 5, 2) ->nullable();
            $table->string('status'); //Diproses (sedang testing, atau sedang di revisi), Valid, Invalid
            $table->time('appointment_date');
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
        Schema::dropIfExists('appointments');
    }
};
