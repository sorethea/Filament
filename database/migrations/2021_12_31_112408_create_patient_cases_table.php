<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_cases', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('patient_id')->constrained('patients','id')->cascadeOnDelete();
            $table->foreignId('doctor_id')->constrained('doctors','id');
            $table->date('case_date');
            $table->string('status')->nullable();
            $table->boolean('active')->default(true);
            $table->text('description')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('patient_cases')->cascadeOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->softDeletes();
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
        Schema::dropIfExists('patient_cases');
    }
}
