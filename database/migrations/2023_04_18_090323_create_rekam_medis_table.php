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
            $table->string('appointment_id');
            $table->string('medicine_id');
            $table->string('extramedicine_id');
            $table->string('employee_id');
            $table->string('symptoms'); //hasil pemeriksaan
            $table->string('keluhan');
            $table->string('penatalaksanaan');
            $table->string('odontogram_klinik');
            $table->string('tindakan');
            $table->string('layanan_sebelumnya');
            $table->string('persetujuan');
            $table->string('disease');// hasil diagnosis penyakit
            $table->string('total_price');
            $table->string('type');
            $table->longtext('note');
            $table->string('flag');
            $table->string('icd10');
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
