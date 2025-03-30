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
        Schema::create("st_father_info", function(Blueprint $table){
            $prefix = "fa_";

            $cols = [
                "fname",
                "lname",
                "job",
                "phone",
                "id_no",
                "education",
                "work_address"
            ];

            foreach($cols as $col){
                if($col == "id_no"){
                    $table->string($prefix . $col)->unique();
                    continue;
                }
                $table->string($prefix . $col);
            }

            $table->string("st_id_no")->unique(); //USED AS SUPER KEY

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("st_father_info");
    }
};
