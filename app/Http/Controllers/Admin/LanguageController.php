<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    protected $Language;
    public function __construct()
    {
        $this->Language = new Language();
    }

    public function index()
    {
        return view('language');
    }

    public function LanguageData(Request $req)
    {
        $search = $req->searchTerm;
        if ($search == '') {
            $builder = DB::table('languages');
            $builder->select('id', 'language_name');
            $languages = $builder->get();
        } else {
            $builder = DB::table('languages');
            $builder->select('id', 'language_name');
            $builder->where('language_name', 'like', '%' . $search . '%');
            $languages = $builder->get();
        }
        $response = array();
        foreach ($languages as $language) {
            $response[] = array(
                'id' => $language->id,
                'text' => $language->language_name,
            );
        }
        return response()->json($response);
    }

    public function Get_LanguageData(Request $req)
    {
        if ($req->ajax()) {
            $builder = DB::table('languages');
            if ($req->status_id != "") {
                $builder->where('is_del', $req->status_id);
            }
            $builder->select('id', 'language_name', 'is_del');
            $result = $builder->get();
            return Datatables::of($result)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $update_btn = '<button title="' . $row->language_name . '" class="btn btn-link edit_appdata" onclick="edit_Languagedata(this)" data-val="' . $row->id . '"><i class="far fa-edit"></i></button>';
                    $delete_btn = '<button data-toggle="modal" target="_blank"  title="' . $row->language_name . '" class="btn btn-link" onclick="delete_Languagedata(this)" data-val="' . $row->id . '" tabindex="-1"><i class="fa fa-trash-alt tx-danger"></i></button>';
                    return $update_btn . $delete_btn;
                })
                ->addColumn('status', function ($row) {
                    $statusList = array(
                        array("info" => "Enable"),
                        array("danger" => "Disable")
                    );
                    $iStatus = $statusList[$row->is_del];
                    $Status_btn = '<span style="color:white"; class="label p-1 label-sm bg-' . (key($iStatus)) . '">' . (current($iStatus)) . '</span>';
                    return $Status_btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
    }

    public function Add_Edit_LanguageData(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'language_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $data = $this->Language->Add_Edit_LanguageData($req->all());
            return $data;
        }
    }

    public function Edit_LanguageData($id)
    {
        $app_Data = Language::Where('id', $id)->first();
        if ($app_Data) {
            return response()->json(['edit_data' => $app_Data]);
        } else {
            return response()->json(['error' => "Language data not found"]);
        }
    }

    public function Delete_LanguageData(Request $req)
    {
        $data = $this->Language->Delete_LanguageData($req->all());
        return $data;
    }
}
