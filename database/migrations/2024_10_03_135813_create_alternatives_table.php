<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alternatives', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dosage_mg')->nullable();
            $table->string('form')->nullable();
            $table->string('route_of_administration')->nullable();
            $table->string('frequency')->nullable();
            $table->string('duration')->nullable();
            $table->string('quantity')->nullable();
            $table->mediumText('more_info')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatives');
    }
};
