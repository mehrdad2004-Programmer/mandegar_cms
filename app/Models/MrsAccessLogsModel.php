<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
