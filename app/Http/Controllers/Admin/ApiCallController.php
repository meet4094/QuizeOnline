<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ApiCall;
use DataTables;

class ApiCallController extends Controller
{
    protected $ApiCall;
    public function __construct()
    {
        $this->ApiCall = new ApiCall();
    }

    public function index()
    {
        $data['title'] = 'apicall';
        return view('apicall', $data);
    }

    public function Get_ApiCallData()
    {
        return DataTables::of(ApiCall::query())->make(true);
    }
}
