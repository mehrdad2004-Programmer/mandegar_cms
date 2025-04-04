<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\StudentMotherInfoModel;
use App\Models\StudentFatherInfoModel;
use App\Models\StudentEducationalInfoModel;
use App\Models\MrsWorkflowModel;
use App\Models\MrsAccessLogsModel;

class StudentPersonalInfoModel extends Model
{
    protected $table = "st_personal_info";

    protected $fillable = [
        "st_fname",
        "st_lname",
        "st_faname",
        "st_id_no",
        "st_birthdate",
        "st_birth_place",
        "st_grade",
        "st_field",
        "st_exp_place",
        "st_serial",
        "st_phone_no",
        "st_telephone",
        "st_address",
        "mianpaye",
        "st_personal_pic"
    ];

    public function mother_info(){
        return $this->hasOne(StudentMotherInfoModel::class, "st_id_no", "st_id_no");
    }

    public function father_info(){
        return $this->hasOne(StudentFatherInfoModel::class, "st_id_no", "st_id_no");
    }

    public function educational_info(){
        return $this->hasOne(StudentEducationalInfoModel::class, "st_id_no", "st_id_no");
    }

    public function work_flow(){
        return $this->hasOne(MrsWorkflowModel::class, "st_id_no", "st_id_no");
    }

    public function access_log(){
        return $this->hasMany(MrsAccessLogsModel::class,"st_id_no","st_id_no");
    }
}
