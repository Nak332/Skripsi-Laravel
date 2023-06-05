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
            $table->integer('patient_id')->nullable();
            $table->string('appointment_id')->nullable();
            $table->string('medicine_id')->nullable();
            $table->string('extramedicine_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('symptoms'); //hasil pemeriksaan
            $table->string('keluhan');
            $table->string('body_temperature');
            $table->string('hasil_anamnesis');
            $table->string('penatalaksanaan')->nullable();
            $table->string('tindakan')->nullable();
            $table->string('layanan_sebelumnya');
            $table->string('persetujuan');
            $table->string('disease');// hasil diagnosis penyakit
            $table->string('total_price');
            $table->string('type');
            $table->longtext('note');
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
