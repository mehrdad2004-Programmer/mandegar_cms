<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MrsWorkflowModel extends Model
{
    protected $table = "mrs_work_flow";

    protected $fillable = [
        "st_id_no",
        "mrs_status",
        "datetime",
    ];
}
