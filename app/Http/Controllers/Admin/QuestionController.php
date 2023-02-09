<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Language;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    protected $Question;
    public function __construct()
    {
        $this->Question = new Question();
    }

    public function index()
    {
        $builder = DB::table('categories')->count();
        if ($builder == 0) {
            $res['res'] = "none";
            $res['mes'] = "Please Add The Category";
            $res['mes_dis'] = "block";
        } else {
            $res['mes'] = "";
            $res['mes_dis'] = "none";
            $res['res'] = "block";
        }
        $res['title'] = 'question';
        return view('question', $res);
    }

    public function Get_QuestionsData(Request $req)
    {
        if ($req->ajax()) {
            $builder = DB::table('questions as q');
            if ($req->status_id != "" && $req->language_id != "" && $req->category_id != '') {
                $builder->where('q.is_del', $req->status_id);
                $builder->where('q.language_id', $req->language_id);
                $builder->where('q.category_id', $req->category_id);
            } else if ($req->status_id != "" && $req->language_id != "" && $req->category_id == '') {
                $builder->where('q.is_del', $req->status_id);
                $builder->where('q.language_id', $req->language_id);
            } else if ($req->status_id == "" && $req->language_id != "" && $req->category_id != '') {
                $builder->where('q.language_id', $req->language_id);
                $builder->where('q.category_id', $req->category_id);
            } else if ($req->status_id != "" && $req->language_id == "" && $req->category_id != '') {
                $builder->where('q.is_del', $req->status_id);
                $builder->where('q.category_id', $req->category_id);
            }

            $builder->join('languages as lan', 'q.language_id', '=', 'lan.id');
            $builder->join('categories as cat', 'q.category_id', '=', 'cat.id');
            $builder->select('q.*', 'lan.language_name', 'cat.category_name');
            $result = $builder->get();
            return Datatables::of($result)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    $url = asset('images/question/' . $row->question_image);
                    $update_btn = '<a target="_blank" href="' . $url . '"><img width="180" src="' . $url . '"/></a>';
                    return $update_btn;
                })

                ->addColumn('action', function ($row) {
                    $update_btn = '<button title="' . $row->question . '" class="btn btn-link edit_appdata" onclick="edit_Questionsdata(this)" data-val="' . $row->id . '"><i class="far fa-edit"></i></button>';
                    $delete_btn = '<button data-toggle="modal" target="_blank"  title="' . $row->question . '" class="btn btn-link" onclick="delete_Questionsdata(this)" data-val="' . $row->id . '" tabindex="-1"><i class="fa fa-trash-alt tx-danger"></i></button>';
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

    public function Add_Edit_QuestionsData(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'question' => 'required',
            'answer_a' => 'required',
            'answer_b' => 'required',
            'answer_c' => 'required',
            'answer_d' => 'required',
            'question_image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $data = $this->Question->Add_Edit_QuestionsData($req->all());
            return $data;
        }
    }

    public function Edit_QuestionsData($id)
    {
        $builder = DB::table('questions as q');
        $builder->join('languages', 'q.language_id', '=', 'languages.id');
        $builder->join('categories as cat', 'q.category_id', '=', 'cat.id');
        $builder->select('q.*', 'languages.language_name as lan_name', 'cat.category_name as cat_name');
        $builder->Where('q.id', $id);
        $Data = $builder->first();

        $response = array();
        $response[] = array(
            'id' => $Data->id,
            'lan_name' => $Data->lan_name,
            'cat_name' => $Data->cat_name,
            'question' => $Data->question,
            'answer_a' => $Data->answer_a,
            'answer_b' => $Data->answer_b,
            'answer_c' => $Data->answer_c,
            'answer_d' => $Data->answer_d,
            'correct_answer' => $Data->correct_answer,
            'question_image' => asset('images/question/' . $Data->question_image),
            'is_del' => $Data->is_del,
        );
        if ($response) {
            return response()->json(['edit_data' => $response[0]]);
        } else {
            return response()->json(['error' => "Category data not found"]);
        }
    }

    public function Delete_QuestionsData(Request $req)
    {
        $data = $this->Question->Delete_QuestionsData($req->all());
        return $data;
    }
}
