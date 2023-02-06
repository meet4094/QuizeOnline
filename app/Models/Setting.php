<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'app_name',
        'package_name',
        'account_name',
        'app_version',
        'request_token'
    ];

    public function Add_Edit_AppSettingData($req)
    {
        if (empty($req['id'])) {
            $request_token = Str::random(15);
        } else {
            $request_token = $req['request_token'];
        }
        $data = array(
            'app_name' => $req['app_name'],
            'package_name' => $req['package_name'],
            'account_name' => $req['account_name'],
            'app_version' => $req['app_version'],
            'request_token' => $request_token
        );
        if ($req['id']) {
            DB::table('settings')->where('id', $req['id'])->update($data);
            return response()->json(['success' => 'Update Successfully..']);
        } else {
            DB::table('settings')->insert($data);
            return response()->json(['success' => 'App data added..']);
        }
    }

    public function Delete_AppSettingData($req)
    {
        DB::table('settings')->where('id', $req['id'])->delete();
        return response()->json(['success' => 'Delete Successfully..']);
    }
}
