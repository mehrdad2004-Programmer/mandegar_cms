<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentEducationalInfoModel extends Model
{
    protected $table = "st_educational_info";

    protected $fillable = [
        "last_school",
        "last_avrage",
        "last_enzebat",
        "last_karname",
        "st_id_no"
    ];
}
