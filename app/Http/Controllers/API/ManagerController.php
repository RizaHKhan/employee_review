<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;

class ManagerController extends BaseController
{
    public function getEmployees()
    {
        return response()->json(['foobar' => 'employee']);
    }
}
