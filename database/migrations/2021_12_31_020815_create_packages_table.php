<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->double('discount')->default(0);
            $table->double('total_amount')->default(0);
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->foreignId('created_by')->nullable()->constrained('users','id')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users','id')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('package_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained('packages','id')->cascadeOnDelete();
            $table->foreignId('service_id')->constrained('services','id')->cascadeOnDelete();
            $table->integer('quantity')->default(1);
            $table->double('unit_price')->default(0);
            $table->double('subtotal')->default(0);
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
        Schema::dropIfExists('packages');
        Schema::dropIfExists('package_services');
    }
}
