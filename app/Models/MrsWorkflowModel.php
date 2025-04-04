<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\StudentPersonalInfoModel;
class MrsWorkflowModel extends Model
{
    protected $table = "mrs_work_flow";

    protected $fillable = [
        "st_id_no",
        "mrs_status",
        "datetime",
    ];

    public function work_flow(){
        return $this->belongsTo(StudentPersonalInfoModel::class, "st_id_no", "st_id_no");
    }
}
