<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\RickyAndMortyResource;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
session_start();

class EpisodeController extends Controller
{
    public function loadData()
    {
        $response = Http::get('https://rickandmortyapi.com/api/episode');
        $items = self::paginate($response->json() ['results'], 1);
        return $items;

    }

    public function index()
    {
        $executed = RateLimiter::attempt('send-message: ' . session_id() , $perMinute = 5, function ()
        {

        });

        if (!$executed)
        {
            return 'Too many requests';
        }

        $results = self::loadData();

        return view('episodes', compact('results'));
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ? : (Paginator::resolveCurrentPage() ? : 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage) , $items->count() , $perPage, $page, $options);
    }
}