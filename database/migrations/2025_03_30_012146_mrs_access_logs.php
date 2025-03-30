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
        Schema::create("mrs_access_logs", function(Blueprint $table){
            $cols = [
                "st_id_no",
                "ip_address",
                "user_agent",
                "date",
                "time",
            ];

            $table->id();

            foreach($cols as $col){
                $table->string($col);
            }

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("mrs_access_logs");
    }
};
