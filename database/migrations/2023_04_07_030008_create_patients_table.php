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
            $table->string('patientName');
            $table->string('patientGender');
            $table->string('patientPhone');
            $table->string('patientAddress');
            $table->string('patientNIK')->unique();
            $table->string('patientAlias');
            $table->date('patientDOB');
            $table->string('patientPOB');
            $table->string('patientMaritalStatus');
            $table->string('patientEmergencyContactName');
            $table->string('patientEmergencyContactPhone');
            $table->integer('hasBPJS');
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
