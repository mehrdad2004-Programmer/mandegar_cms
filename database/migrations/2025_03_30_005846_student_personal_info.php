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
        Schema::create('st_personal_info', function(Blueprint $table){
            $prefix = "st_";

            $cols = [
                "fname",
                "lname",
                "faname",
                "id_no", //USED AS SUPER KEY
                "birthdate",
                "birth_place",
                "grade",
                "field",
                "exp_place",
                "serial",
                "phone_no",
                "telephone",
                "address",
                "personal_pic"
            ];

            $table->id();

            foreach($cols as $col){
                if($col == "id_no"){
                    $table->string($prefix . $col)->unique();
                    continue;
                }
                $table->string($prefix . $col);
            }

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("st_personal_info");
    }
};
