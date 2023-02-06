<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data['languages_data'] = DB::table('languages')->count();
        $data['categories_data'] = DB::table('categories')->count();
        $data['questions_data'] = DB::table('questions')->count();
        $data['api_calls_data'] = DB::table('api_calls')->count();
        return view('dashboard', $data);
    }
}
