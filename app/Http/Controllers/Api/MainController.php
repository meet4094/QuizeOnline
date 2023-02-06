<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Main;
use App\Models\Api\Validation;

class MainController extends Controller
{
    protected $Main;
    protected $Validation;
    public function __construct()
    {
        $this->Main = new Main();
        $this->Validation = new Validation();
    }

    public function ApiCallData(Request $req)
    {
        $validation_data = $this->Validation->ApiCallData($req);
        if ($validation_data->original['statuscode'] == 1) {
            $data = $this->Main->ApiCallData($req);
            return response()->json([
                "statuscode" => 1,
                "msg" => "Api Call successfully.",
                "data" => $data
            ]);
        } else {
            return $validation_data;
        }
    }

    public function LanguageData(Request $req)
    {
        $validation_data = $this->Validation->LanguageData($req);
        if ($validation_data->original['statuscode'] == 1) {
            $data = $this->Main->LanguageData($req);
            return response()->json([
                "statuscode" => 1,
                "msg" => "success!!.",
                "data" => $data
            ]);
        } else {
            return $validation_data;
        }
    }

    public function CategoryData(Request $req)
    {
        $validation_data = $this->Validation->CategoryData($req);
        if ($validation_data->original['statuscode'] == 1) {
            $data = $this->Main->CategoryData($req);
            return response()->json([
                "statuscode" => 1,
                "msg" => "success!!.",
                "data" => $data
            ]);
        } else {
            return $validation_data;
        }
    }
    public function QuestionData(Request $req)
    {
        $validation_data = $this->Validation->QuestionData($req);
        if ($validation_data->original['statuscode'] == 1) {
            $data = $this->Main->QuestionData($req);
            return response()->json([
                "statuscode" => 1,
                "msg" => "success!!.",
                "data" => $data
            ]);
        } else {
            return $validation_data;
        }
    }
}