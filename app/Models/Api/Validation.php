<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class Validation extends Model
{
    use HasFactory;

    public function ApiCallData($req)
    {
        $request_token = $req->header('request-token');
        $data = DB::table('settings')->where('request_token', $request_token)->first();
        if (empty($request_token) || empty($data->request_token)) {
            return response()->json([
                "statuscode" => 7,
                "msg" => "Request token missing"
            ]);
        } else {
            $validator = Validator::make($req->all(), [
                'device_id' => 'required',
                'package_name' => 'required',
                'app_version' => 'required',
                'app_version_code' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "statuscode" => 0,
                    'error' => $validator->errors()->toArray()
                ]);
            } else {
                return response()->json([
                    "statuscode" => 1,
                    "msg" => "Success"
                ]);
            }
        }
    }

    public function LanguageData($req)
    {
        $request_token = $req->header('request-token');
        $AppToken = $req->app_token;
        $DeviceId = $req->device_id;
        $AppId = $req->app_id;
        $LanguageId = $req->language_id;
        $RequestTokenData = DB::table('settings')->where('request_token', $request_token)->first();
        $AppTokenData = DB::table('api_calls')->where('app_token', $AppToken)->first();
        $LanguageData = DB::table('languages')->where('id', $LanguageId)->first();

        if (empty($request_token) || empty($RequestTokenData->request_token)) {
            return response()->json([
                "statuscode" => 7,
                "msg" => "Request token missing"
            ]);
        } else {
            $validator = Validator::make($req->all(), [
                'app_token' => 'required',
                'device_id' => 'required',
                'app_id' => 'required',
                'language_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "statuscode" => 0,
                    'error' => $validator->errors()->toArray()
                ]);
            } else {
                if (empty($AppToken) || empty($AppTokenData->app_token)) {
                    return response()->json([
                        "statuscode" => 7,
                        "msg" => "App token Invalide"
                    ]);
                } else if ($DeviceId != $AppTokenData->device_id) {
                    return response()->json([
                        "statuscode" => 7,
                        "msg" => "Device Id Invalide"
                    ]);
                } else if ($AppId != $AppTokenData->app_id) {
                    return response()->json([
                        "statuscode" => 7,
                        "msg" => "App Id Invalide"
                    ]);
                } else if ($LanguageData == '' || $LanguageId != $LanguageData->id) {
                    return response()->json([
                        "statuscode" => 7,
                        "msg" => "Language Id Invalide"
                    ]);
                } else {
                    return response()->json([
                        "statuscode" => 1,
                        "msg" => "Success"
                    ]);
                }
            }
        }
    }

    public function CategoryData($req)
    {
        $request_token = $req->header('request-token');
        $AppToken = $req->app_token;
        $DeviceId = $req->device_id;
        $AppId = $req->app_id;
        $CategoryId = $req->category_id;
        $RequestTokenData = DB::table('settings')->where('request_token', $request_token)->first();
        $AppTokenData = DB::table('api_calls')->where('app_token', $AppToken)->first();
        $CategoryData = DB::table('categories')->where('id', $CategoryId)->first();

        if (empty($request_token) || empty($RequestTokenData->request_token)) {
            return response()->json([
                "statuscode" => 7,
                "msg" => "Request token missing"
            ]);
        } else {
            $validator = Validator::make($req->all(), [
                'app_token' => 'required',
                'device_id' => 'required',
                'app_id' => 'required',
                'category_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "statuscode" => 0,
                    'error' => $validator->errors()->toArray()
                ]);
            } else {
                if (empty($AppToken) || empty($AppTokenData->app_token)) {
                    return response()->json([
                        "statuscode" => 7,
                        "msg" => "App token Invalide"
                    ]);
                } else if ($DeviceId != $AppTokenData->device_id) {
                    return response()->json([
                        "statuscode" => 7,
                        "msg" => "Device Id Invalide"
                    ]);
                } else if ($AppId != $AppTokenData->app_id) {
                    return response()->json([
                        "statuscode" => 7,
                        "msg" => "App Id Invalide"
                    ]);
                } else if ($CategoryData == '' || $CategoryId != $CategoryData->id) {
                    return response()->json([
                        "statuscode" => 7,
                        "msg" => "Category Id Invalide"
                    ]);
                } else {
                    return response()->json([
                        "statuscode" => 1,
                        "msg" => "Success"
                    ]);
                }
            }
        }
    }

    public function QuestionData($req)
    {
        $request_token = $req->header('request-token');
        $AppToken = $req->app_token;
        $DeviceId = $req->device_id;
        $AppId = $req->app_id;
        $LanguageId = $req->language_id;
        $CategoryId = $req->category_id;
        $RequestTokenData = DB::table('settings')->where('request_token', $request_token)->first();
        $AppTokenData = DB::table('api_calls')->where('app_token', $AppToken)->first();
        $LanguageData = DB::table('languages')->where('id', $LanguageId)->first();
        $CategoryData = DB::table('categories')->where('id', $CategoryId)->first();

        if (empty($request_token) || empty($RequestTokenData->request_token)) {
            return response()->json([
                "statuscode" => 7,
                "msg" => "Request token missing"
            ]);
        } else {
            $validator = Validator::make($req->all(), [
                'app_token' => 'required',
                'device_id' => 'required',
                'app_id' => 'required',
                'language_id' => 'required',
                'category_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "statuscode" => 0,
                    'error' => $validator->errors()->toArray()
                ]);
            } else {
                if (empty($AppToken) || empty($AppTokenData->app_token)) {
                    return response()->json([
                        "statuscode" => 7,
                        "msg" => "App token Invalide"
                    ]);
                } else if ($DeviceId != $AppTokenData->device_id) {
                    return response()->json([
                        "statuscode" => 7,
                        "msg" => "Device Id Invalide"
                    ]);
                } else if ($AppId != $AppTokenData->app_id) {
                    return response()->json([
                        "statuscode" => 7,
                        "msg" => "App Id Invalide"
                    ]);
                } else if ($LanguageData == '' || $LanguageId != $LanguageData->id) {
                    return response()->json([
                        "statuscode" => 7,
                        "msg" => "Language Id Invalide"
                    ]);
                } else if ($CategoryData == '' || $CategoryId != $CategoryData->id) {
                    return response()->json([
                        "statuscode" => 7,
                        "msg" => "Category Id Invalide"
                    ]);
                } else {
                    return response()->json([
                        "statuscode" => 1,
                        "msg" => "Success"
                    ]);
                }
            }
        }
    }
}
