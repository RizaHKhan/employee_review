<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    public function getManagers(Request $request) {
        return response()->json([ 'foobar' => 'gaybar']);
    }    
}
