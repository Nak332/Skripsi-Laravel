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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('appointment_id')->nullable();
            $table->string('medicine_id')->nullable();
            $table->string('employee_id');
            $table->string('symptoms'); //hasil pemeriksaan
            $table->string('sistol');
            $table->string('diastol');
            $table->string('attachment')->nullable();
            $table->string('complaint');
            $table->string('body_temperature');
            $table->string('anamnesis');
            $table->string('follow_up_plan')->nullable();
            $table->string('treatment')->nullable();
            $table->string('past_service')->nullable();
            $table->string('agreement')->nullable();
            $table->string('diagnosis');// hasil diagnosis penyakit
            $table->string('total_price')->nullable();
            $table->longtext('note')->nullable();
            $table->string('type')->nullable();
            $table->string('flag')->nullable();
            $table->string('icd10')->nullable();
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
        Schema::dropIfExists('rekam_medis');
    }
};
