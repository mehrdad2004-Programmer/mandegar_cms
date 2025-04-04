<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use App\Models\StudentPersonalInfoModel;
class MrsAccessLogsModel extends Model
{
    protected $table = "mrs_access_logs";

    protected $fillable = [
        "st_id_no",
        "ip_address",
        "user_agent",
        "date",
        "time",
    ];

    public function access_log(){
        return $this->belongsTo(StudentPersonalInfoModel::class, "st_id_no", "st_id_no");
    }
}
