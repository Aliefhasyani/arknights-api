<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ApiController extends Controller
{


    public function index()
    {

        $response = Http::get('https://api.rhodesapi.com/api/operator');
        $allOperators = collect($response->json());

    
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 15;


        $currentItems = $allOperators->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $operators = new LengthAwarePaginator(
            $currentItems,
            $allOperators->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('home', compact('operators'));
    }

    public function show($name)
    {
        $response = Http::get("https://api.rhodesapi.com/api/operator/{$name}");

        $operator = $response->json();

        return view('operator_data',compact('operator'));
    }   

}
