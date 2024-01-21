<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('p_banners', function (Blueprint $table) {
            $table->id();
            $table->string('pbanner_name');
            $table->string('pbanner_m_image');
            $table->string('pbanner_d_image');
            $table->string('end_date');
            $table->string('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_banners');
    }
};
