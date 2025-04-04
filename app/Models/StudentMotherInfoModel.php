<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\StudentPersonalInfoModel;

class StudentMotherInfoModel extends Model
{
    protected $table = "st_mother_info";

    protected $fillable = [
        "mo_fname",
        "mo_lname",
        "mo_job",
        "mo_phone",
        "mo_id_no",
        "mo_education",
        "mo_work_address",
        "st_id_no"
    ];

    public function mother_info(){
        return $this->belongsTo(StudentPersonalInfoModel::class, "st_id_no", "st_id_no");
    }
}
