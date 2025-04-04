<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\StudentPersonalInfoModel;

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

    public function educational_info(){
        return $this->belongsTo(StudentPersonalInfoModel::class, "st_id_no", "st_id_no");
    }
}
