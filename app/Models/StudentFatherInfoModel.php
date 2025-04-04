<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\StudentPersonalInfoModel;

class StudentFatherInfoModel extends Model
{
    protected $table = "st_father_info";

    protected $fillable = [
        "fa_fname",
        "fa_lname",
        "fa_job",
        "fa_phone",
        "fa_id_no",
        "fa_education",
        "fa_work_address",
        "st_id_no",
    ];

    public function father_info(){
        return $this->belongsTo(StudentPersonalInfoModel::class, "st_id_no", "st_id_no");
    }
}
