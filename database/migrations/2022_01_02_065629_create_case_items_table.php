<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_items', function (Blueprint $table) {
            $table->id();
            $table->morphs('item');
            $table->foreignId('case_id')->constrained('patient_cases','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->double('price')->default(0);
            $table->json('procedure')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('case_items');
    }
}
