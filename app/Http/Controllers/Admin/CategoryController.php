<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    protected $Category;
    public function __construct()
    {
        $this->Category = new Category();
    }

    public function index()
    {
        $builder = DB::table('languages')->count();
        if ($builder == 0) {
            $res['btn'] = "none";
            $res['mes'] = "Please Add The Language";
            $res['mes_dis'] = "block";
        } else {
            $res['mes'] = "";
            $res['mes_dis'] = "none";
            $res['btn'] = "block";
        }
        return view('category', $res);
    }

    public function CategoryData(Request $req)
    {
        $search = $req->searchTerm;
        if ($search == '') {
            $builder = DB::table('categories');
            $builder->select('id', 'category_name');
            $categories = $builder->get();
        } else {
            $builder = DB::table('categories');
            $builder->select('id', 'category_name');
            $builder->where('category_name', 'like', '%' . $search . '%');
            $categories = $builder->get();
        }
        $response = array();
        foreach ($categories as $category) {
            $response[] = array(
                'id' => $category->id,
                'text' => $category->category_name,
            );
        }
        return response()->json($response);
    }

    public function Get_CategoryData(Request $req)
    {
        if ($req->ajax()) {
            $builder = DB::table('categories as c');

            if ($req->status_id != "" && $req->language_id) {
                $builder->where('c.is_del', $req->status_id);
                $builder->where('c.language_id', $req->language_id);
            } else if ($req->status_id != "" || $req->language_id != '') {
                $builder->where('c.is_del', $req->status_id);
                $builder->orwhere('c.language_id', $req->language_id);
            }

            $builder->join('languages as lan', 'c.language_id', '=', 'lan.id');
            $builder->select('c.*', 'lan.language_name');
            $result = $builder->get();

            return Datatables::of($result)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    $url = asset('images/category/' . $row->category_image);
                    $update_btn = '<a target="_blank" href="' . $url . '"><img width="180" src="' . $url . '"/></a>';
                    return $update_btn;
                })

                ->addColumn('action', function ($row) {
                    $update_btn = '<button title="' . $row->category_name . '" class="btn btn-link edit_appdata" onclick="edit_Categorydata(this)" data-val="' . $row->id . '"><i class="far fa-edit"></i></button>';
                    $delete_btn = '<button data-toggle="modal" target="_blank"  title="' . $row->category_name . '" class="btn btn-link" onclick="delete_Categorydata(this)" data-val="' . $row->id . '" tabindex="-1"><i class="fa fa-trash-alt tx-danger"></i></button>';
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

                ->rawColumns(['image', 'action', 'status'])
                ->make(true);
        }
    }

    public function Add_Edit_CategoryData(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'category_name' => 'required',
            'category_image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $data = $this->Category->Add_Edit_CategoryData($req->all());
            return $data;
        }
    }

    public function Edit_CategoryData($id)
    {
        $builder = DB::table('categories as c');
        $builder->join('languages', 'c.language_id', '=', 'languages.id');
        $builder->select('c.*', 'languages.language_name as lan_name');
        $builder->Where('c.id', $id);
        $Data = $builder->first();

        $response = array();
        $response[] = array(
            'id' => $Data->id,
            'lan_name' => $Data->lan_name,
            'category_name' => $Data->category_name,
            'category_image' => asset('images/category/' . $Data->category_image),
            'is_del' => $Data->is_del,
        );
        if ($response[0]) {
            return response()->json(['edit_data' => $response[0]]);
        } else {
            return response()->json(['error' => "Category data not found"]);
        }
    }

    public function Delete_CategoryData(Request $req)
    {
        $data = $this->Category->Delete_CategoryData($req->all());
        return $data;
    }
}
