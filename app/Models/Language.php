<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'language_name',
        'is_del'
    ];

    public function Add_Edit_LanguageData($req)
    {
        $data = array(
            'language_name' => $req['language_name'],
            'is_del' => $req['is_del'],
        );  
        if ($req['id']) {
            DB::table('languages')->where('id', $req['id'])->update($data);
            return response()->json(['success' => 'Update Successfully..']);
        } else {
            DB::table('languages')->insert($data);
            return response()->json(['success' => 'Language data added..']);
        }
    }

    public function Delete_LanguageData($req)
    {
        DB::table('languages')->where('id', $req['id'])->delete();
        return response()->json(['success' => 'Delete Successfully..']);
    }
}
