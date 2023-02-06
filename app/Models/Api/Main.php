<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Main extends Model
{
    use HasFactory;

    function get_client_ip()
    {
        $ipAddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipAddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipAddress = 'UNKNOWN';
        return $ipAddress;
    }

    public function ApiCallData($req)
    {
        $request_token = $req->header('request-token');
        $data = DB::table('settings')->where('request_token', $request_token)->first();

        $ipAddress = $this->get_client_ip();
        $app_token = Str::random(15);
        $Api_CallData = array(
            'app_id' => $data->id,
            'device_id' => $req['device_id'],
            'package_name' => $req['package_name'],
            'app_version' => $req['app_version'],
            'version_code' => $req['app_version_code'],
            'app_token' => $app_token,
            'ip_address' => $ipAddress
        );
        $register = DB::table('api_calls')
            ->insert($Api_CallData);
        return $Api_CallData;
    }

    public function LanguageData($req)
    {
        $LanguageData = DB::table('languages')->where('id', $req->language_id)->first();
        $data = array([
            'id' => $LanguageData->id,
            'language_name' => $LanguageData->language_name,
            'status' => $LanguageData->is_del,
        ]);
        return $data;
    }

    public function CategoryData($req)
    {
        $CategoryData = DB::table('categories')->where('id', $req->category_id)->first();
        $data = array([
            'id' => $CategoryData->id,
            'language_name' => $CategoryData->category_name,
            'status' => $CategoryData->is_del,
        ]);
        return $data;
    }

    public function QuestionData($req)
    {
        $builder = DB::table('questions');
        $builder->where('category_id', $req->category_id);
        $builder->where('language_id', $req->language_id);
        $QuestionsData = $builder->get();

        $data = array();
        foreach ($QuestionsData as $Questions) {
            $data = array([
                'que_id' => $Questions->id,
                'question' => $Questions->question,
                'answer_a' => $Questions->answer_a,
                'answer_b' => $Questions->answer_b,
                'answer_c' => $Questions->answer_c,
                'answer_d' => $Questions->answer_d,
                'correct_answer' => $Questions->correct_answer,
                'question_image' => $Questions->question_image,
                'status' => $Questions->is_del,
            ]);
        }
        return $data;
    }
}
