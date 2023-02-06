<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'language_id',
        'category_id',
        'questions',
        'answer_a',
        'answer_b',
        'answer_c',
        'answer_d',
        'correct_answer',
        'questions_image',
        'is_del'
    ];

    public function Add_Edit_QuestionsData($req)
    {
        if ($req['id']) {

            if (isset($req['question_image']) && $req['question_image']->getError() == 0) {

                $iOriginal = Question::Where('id', $req['id'])->first();

                if (isset($iOriginal->attributes['question_image']) && !empty($iOriginal->attributes['question_image'])) {

                    $iOriginal = public_path('images/question/') . $iOriginal->attributes['question_image'];

                    if (file_exists($iOriginal))

                        @unlink($iOriginal);
                }

                $file = $req['question_image'];
                $extension = $file->extension();
                $fileName = time() . '.' . $extension;
                $file->move(public_path('/images/question/'), $fileName);
                $data['question_image'] = $fileName;
            }
            $data['language_id'] = $req['language_id'];
            $data['category_id'] = $req['category_id'];
            $data['question'] = $req['question'];
            $data['answer_a'] = $req['answer_a'];
            $data['answer_b'] = $req['answer_b'];
            $data['answer_c'] = $req['answer_c'];
            $data['answer_d'] = $req['answer_d'];
            $data['correct_answer'] = $req['correct_answer'];
            $data['is_del'] = $req['is_del'];

            DB::table('questions')->where('id', $req['id'])->update($data);
            return response()->json(['success' => 'Update Successfully..']);
        } else {
            if (isset($_FILES['question_image']['error']) && $_FILES['question_image']['error'] == 0) {
                $file = $req['question_image'];
                $extension = $file->extension();
                $fileName = time() . '.' . $extension;
                $file->move(public_path('/images/question/'), $fileName);
                $data['question_image'] = $fileName;
            }

            $data['language_id'] = $req['language_id'];
            $data['category_id'] = $req['category_id'];
            $data['question'] = $req['question'];
            $data['answer_a'] = $req['answer_a'];
            $data['answer_b'] = $req['answer_b'];
            $data['answer_c'] = $req['answer_c'];
            $data['answer_d'] = $req['answer_d'];
            $data['correct_answer'] = $req['correct_answer'];
            $data['is_del'] = $req['is_del'];

            DB::table('questions')->insert($data);
            return response()->json(['success' => 'Question data added..']);
        }
    }

    public function Delete_QuestionsData($req)
    {
        $iOriginal = Question::Where('id', $req['id'])->first();

        if (isset($iOriginal->attributes['question_image']) && !empty($iOriginal->attributes['question_image'])) {

            $iOriginal = public_path('images/question/') . $iOriginal->attributes['question_image'];

            if (file_exists($iOriginal))

                @unlink($iOriginal);
        }

        DB::table('questions')->where('id', $req['id'])->delete();
        return response()->json(['success' => 'Delete Successfully..']);
    }
}
