<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(['message' => 'You have connected to the API.']);
    }
}
