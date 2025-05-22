<?php

namespace App\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class JokeController extends Controller
{
    public function index(): JsonResponse
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get('https://icanhazdadjoke.com/');
        
        if ($response->successful()) {
            return response()->json([
                'success' => true,
                'data' => $response->json(),
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to fetch joke',
        ], 500);
    }
}
