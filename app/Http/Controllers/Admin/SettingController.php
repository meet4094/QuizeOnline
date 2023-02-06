<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use DataTables;

class SettingController extends Controller
{
    protected $Setting;
    public function __construct()
    {
        $this->Setting = new Setting();
    }

    public function index()
    {
        return view('setting');
    }

    public function Get_AppSettingData()
    {
        return DataTables::of(Setting::query())
            ->addColumn('action', function ($row) {
                $update_btn = '<button title="' . $row->app_name . '" class="btn btn-link edit_appdata" onclick="edit_appData(this)" data-val="' . $row->id . '"><i class="far fa-edit"></i></button>';
                $delete_btn = '<button data-toggle="modal" target="_blank"  title="' . $row->app_name . '" class="btn btn-link" onclick="delete_appData(this)" data-val="' . $row->id . '" tabindex="-1"><i class="fa fa-trash-alt tx-danger"></i></button>';
                return $update_btn . $delete_btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function Add_Edit_AppSettingData(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'app_name' => 'required',
            'package_name' => 'required',
            'account_name' => 'required',
            'app_version' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $data = $this->Setting->Add_Edit_AppSettingData($req->all());
            return $data;
        }
    }

    public function Edit_AppSettingData($id)
    {
        $app_Data = Setting::Where('id', $id)->first();
        if ($app_Data) {
            return response()->json(['edit_data' => $app_Data]);
        } else {
            return response()->json(['error' => "App data not found"]);
        }
    }

    public function Delete_AppSettingData(Request $req)
    {
        $data = $this->Setting->Delete_AppSettingData($req->all());
        return $data;
    }
}
