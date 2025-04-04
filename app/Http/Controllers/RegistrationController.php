<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//USING MODEL TO REGISTER
use App\Models\MrsAccessLogsModel;
use App\Models\MrsWorkflowModel;
use App\Models\StudentEducationalInfoModel;
use App\Models\StudentFatherInfoModel;
use App\Models\StudentMotherInfoModel;
use App\Models\StudentPersonalInfoModel;

use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function register(Request $request){
        try{
            $ST_PREFIX = "st_";
            $MO_PREFIX = "mo_";
            $FA_PREFIX = "fa_";
        
            $st_personal_info = [
                $ST_PREFIX . "fname" => $request->input($ST_PREFIX . "fname"),
                $ST_PREFIX . "lname" => $request->input($ST_PREFIX . "lname"),
                $ST_PREFIX . "faname" => $request->input($ST_PREFIX . "faname"),
                $ST_PREFIX . "id_no" => $request->input($ST_PREFIX . "id_no"),
                $ST_PREFIX . "birthdate" => $request->input($ST_PREFIX . "birthdate"),
                $ST_PREFIX . "birth_place" => $request->input($ST_PREFIX . "birth_place"),
                $ST_PREFIX . "grade" => $request->input($ST_PREFIX . "grade"),
                $ST_PREFIX . "field" => $request->input($ST_PREFIX . "field"),
                $ST_PREFIX . "exp_place" => $request->input($ST_PREFIX . "exp_place"),
                $ST_PREFIX . "serial" => $request->input($ST_PREFIX . "serial"),
                $ST_PREFIX . "phone_no" => $request->input($ST_PREFIX . "phone_no"),
                $ST_PREFIX . "telephone" => $request->input($ST_PREFIX . "telephone"),
                $ST_PREFIX . "address" => $request->input($ST_PREFIX . "address"),
                "mianpaye" => $request->mianpaye,
                $ST_PREFIX . "personal_pic" => $request->input($ST_PREFIX . "personal_pic")
            ];

            $student_mother_info = [
                $MO_PREFIX . "fname" => $request->input($MO_PREFIX . "fname"),
                $MO_PREFIX . "lname" => $request->input($MO_PREFIX . "lname"),
                $MO_PREFIX . "job" => $request->input($MO_PREFIX . "job"),
                $MO_PREFIX . "phone" => $request->input($MO_PREFIX . "phone"),
                $MO_PREFIX . "id_no" => $request->input($MO_PREFIX . "id_no"),
                $MO_PREFIX . "education" => $request->input($MO_PREFIX . "education"),
                $MO_PREFIX . "work_address" => $request->input($MO_PREFIX . "work_address"),
                $ST_PREFIX . "id_no" => $request->input($ST_PREFIX . "id_no")
            ];

            $studetn_father_info = [
                $FA_PREFIX . "fname" => $request->input($FA_PREFIX . "fname"),
                $FA_PREFIX . "lname" => $request->input($FA_PREFIX . "lname"),
                $FA_PREFIX . "job" => $request->input($FA_PREFIX . "job"),
                $FA_PREFIX . "id_no" => $request->input($FA_PREFIX . "id_no"),
                $FA_PREFIX . "education" => $request->input($FA_PREFIX . "education"),
                $FA_PREFIX . "work_address" => $request->input($FA_PREFIX . "work_address"),
                $ST_PREFIX . "id_no" => $request->input($ST_PREFIX . "id_no")
            ];

            $student_educational_info = [
                "last_school" => $request->last_school,
                "last_avrage" => $request->last_avrage,
                "last_enzebat" => $request->last_enzebat,
                "last_karname" => $request->last_karname,
                "st_id_no" => $request->st_id_no
            ];

            $mrs_workflow = [
                "st_id_no",
                "mrs_status",
                "datetime",
            ];

            $mrs_access_logs = [
                "st_id_no",
                "ip_address",
                "user_agent",
                "date",
                "time"
            ];

            $upload_contents = [
                "personal_pic/dahom/",
                "personal_pic/yazdahom/",
                "personal_pic/davazdahom/"
            ];


            //START TRANSACTION
            DB::beginTransaction();

            $pic_uploaded = $request->file("st_personal_pic")->storeAs("personal_pic/" . $request->st_grade, $request->st_id_no . $request->file("st_personal_pic")->getClientOriginalExtension());

            $kar_uploaded = $request->file("last_karname")->storeAs("karname/" . $request->st_grade, $request->st_id_no . $request->file("last_karname")->getClientOriginalExtension());

            if($pic_uploaded && $kar_uploaded){
                //INSERTING INTO TABLES
                MrsAccessLogsModel::create($mrs_access_logs);
                MrsWorkflowModel::create($mrs_workflow);
                StudentEducationalInfoModel::create($student_educational_info);
                StudentFatherInfoModel::create($studetn_father_info);
                StudentMotherInfoModel::create($student_mother_info);
                StudentPersonalInfoModel::create($st_personal_info);

                DB::commit();
                return response()->json([
                    "msg" => "registered",
                    "statuscode" => 201
                ], 201);
            }
            DB::rollBack();
            return response()->json([
                "msg" => "could not be uploaded",
                "statuscode" => 400
            ], 400);

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                "error" => $e->getMessage(),
                "statuscode" => 500
            ], 500);
        }
    }


    public function getStudentData(){
        try{
            $data = StudentPersonalInfoModel::with([
                "mother_info",
                "father_info",
                "educational_info",
                "work_flow",
                "access_log"
            ])->get();

            return response()->json([
                "data" => $data,
                "statuscode" => 200
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "statuscode" => 500
            ], 500);
        }
    }

    public function setStatus(Request $request){
        try{
            $updated = MrsWorkflowModel::where("st_id_no", $request->st_id_no)->update([
                "mrs_status" => $request->status
            ]);

            if($updated){
                return response()->json([
                    "msg" => "updated",
                    "statuscode" => 200
                ], 200);
            }

            return response()->json([
                "msg" => "could not update",
                "statuscode" => 400
            ], 400);
        }catch(\Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "statuscode" => 500
            ]);
        }
    }


}
