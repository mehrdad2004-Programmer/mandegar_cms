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
        Schema::create("st_educational_info", function(Blueprint $table){
            $cols = [
                "last_school",
                "last_avrage",
                "last_enzebat",
                "last_karname"
            ];

            $table->id();
            
            foreach($cols as $col){
                $table->string($col);
            }

            $table->string("st_id_no")->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("st_educational_info");
    }
};
