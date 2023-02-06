<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'language_id',
        'category_name',
        'category_image',
        'is_del'
    ];

    public function Add_Edit_CategoryData($req)
    {
        if ($req['id']) {

            if (isset($req['category_image']) && $req['category_image']->getError() == 0) {

                $iOriginal = Category::Where('id', $req['id'])->first();

                if (isset($iOriginal->attributes['category_image']) && !empty($iOriginal->attributes['category_image'])) {

                    $iOriginal = public_path('images/category/') . $iOriginal->attributes['category_image'];

                    if (file_exists($iOriginal))

                        @unlink($iOriginal);
                }

                $file = $req['category_image'];
                $extension = $file->extension();
                $fileName = time() . '.' . $extension;
                $file->move(public_path('/images/category/'), $fileName);
                $data['category_image'] = $fileName;
            }
            $data['language_id'] = $req['language_id'];
            $data['category_name'] = $req['category_name'];
            $data['is_del'] = $req['is_del'];

            DB::table('categories')->where('id', $req['id'])->update($data);
            return response()->json(['success' => 'Update Successfully..']);
        } else {
            if (isset($_FILES['category_image']['error']) && $_FILES['category_image']['error'] == 0) {
                $file = $req['category_image'];
                $extension = $file->extension();
                $fileName = time() . '.' . $extension;
                $file->move(public_path('/images/category/'), $fileName);
                $data['category_image'] = $fileName;
            }

            $data['language_id'] = $req['language_id'];
            $data['category_name'] = $req['category_name'];
            $data['is_del'] = $req['is_del'];

            DB::table('categories')->insert($data);
            return response()->json(['success' => 'Category data added..']);
        }
    }

    public function Delete_CategoryData($req)
    {
        $iOriginal = Category::Where('id', $req['id'])->first();

        if (isset($iOriginal->attributes['category_image']) && !empty($iOriginal->attributes['category_image'])) {

            $iOriginal = public_path('images/category/') . $iOriginal->attributes['category_image'];

            if (file_exists($iOriginal))

                @unlink($iOriginal);
        }

        DB::table('categories')->where('id', $req['id'])->delete();
        return response()->json(['success' => 'Delete Successfully..']);
    }
}
