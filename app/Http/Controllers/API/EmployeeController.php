<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends BaseController
{
    public function getEmployees()
    {
        return response()->json(['foobar' => 'employee']);
    }
}
