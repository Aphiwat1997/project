<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Dormitory;
use App\Picture;

class WelcomeController extends Controller
{
    public function index()
    {
        // $dormitorys = Dormitory::all();
        $dormitorys = DB::table('dormitories')
        ->join('pictures', 'dormitories.id', '=', 'pictures.dormitory_id')
        ->get();
        $formatDormitory = array();
        $duplicated = array();
        foreach ($dormitorys as $value) {
            if (!in_array($value->dormitory_id, $duplicated)) {
                $formatDormitory[] = $value;
                $duplicated[] = $value->dormitory_id;
            }
        }
        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 10;
        $currentItems = array_slice($formatDormitory, $perPage * ($currentPage - 1), $perPage);
        $results = new Paginator($currentItems, count($formatDormitory), $perPage, $currentPage);
        return view('welcome', ['dormitorys' => $results, 'all' => $formatDormitory]);
    }
}