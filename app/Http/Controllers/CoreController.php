<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoreController extends Controller
{
    public function response($result)
    {
        return response()->json($result,$result['statusCode']);
    }
}
