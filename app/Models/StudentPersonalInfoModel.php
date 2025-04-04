<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
