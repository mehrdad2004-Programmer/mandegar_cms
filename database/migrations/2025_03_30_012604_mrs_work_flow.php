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
        Schema::create("mrs_work_flow", function (Blueprint $table){
            $table->id();
            $table->string("st_id_no")->unique();
            $table->string("tracking_code")->unique();
            $table->string("mrs_status")->default("0");
            $table->string("datetime");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("mrs_work_flow");
    }
};
