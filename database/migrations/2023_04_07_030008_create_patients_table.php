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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('patient_gender');
            $table->string('patient_phone');
            $table->string('patient_address');
            $table->string('patient_NIK')->unique();
            $table->string('patient_alias');
            $table->date('patient_DOB');
            $table->string('patient_POB');
            $table->string('patient_marital_status');
            $table->string('patient_emergency_contact_name');
            $table->string('patient_emergency_contact_phone');
            $table->integer('has_BPJS');
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
        Schema::dropIfExists('patients');
    }
};
