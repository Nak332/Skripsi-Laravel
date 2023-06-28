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
            $table->integer('employee_id');
            $table->integer('sistol');
            $table->integer('diastol');
            $table->string('attachment')->nullable();
            $table->integer('height') ->nullable();
            $table->float('weight', 5, 2) ->nullable();
            $table->float('body_temperature', 5, 2)->nullable();
            $table->integer('pulse') ->nullable();
            $table->float('blood_sugar', 5, 2) ->nullable();
            $table->string('extra_medicine')->nullable();
            $table->string('anamnesis');
            $table->string('quantity')->nullable();
            $table->string('follow_up_plan')->nullable();
            $table->string('treatment')->nullable();
            $table->string('past_service')->nullable();
            $table->string('diagnosis');// hasil diagnosis penyakit
            $table->longtext('note')->nullable();
            $table->string('type')->nullable();
            $table->string('flag')->nullable();
            $table->string('icd10')->nullable();
            $table->string('rujukan_recipient')->nullable();
            $table->string('rujukan_specialist')->nullable();
            $table->string('rujukan_current_state')->nullable();
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
