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

class RickAndMortyController extends Controller
{
    public function loadData()
    {
        $response = Http::get('https://rickandmortyapi.com/api/character');
        $items = self::paginate($response->json() ['results'], 1);
        return $items;

    }
    public function index(Request $request)
    {
        $executed = RateLimiter::attempt('send-message: ' . session_id() , $perMinute = 5, function ()
        {

        });

        if (!$executed)
        {
            return 'Too many requests';
        }

        $results = self::loadData();
        $search = $request->input('search');
        if ($search !== null)
        {

            $response = Http::get('https://rickandmortyapi.com/api/character');
            $index = self::search($response, $search);

            if ($index !== false && is_numeric($index))
            {
                $result = $response->json() ['results'][$index];
                //dd($result);
                return view('index', compact('result'));
            }

            return view('index', compact('results'));
        }

        return view('index', compact('results'));
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ? : (Paginator::resolveCurrentPage() ? : 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage) , $items->count() , $perPage, $page, $options);
    }

    public function search($response, $search)
    {
        $x = 0;

        while ($x < count($response->json() ['results']))
        {
            if (stripos($response->json() ['results'][$x]['name'], $search) !== false)
            {
                return $x;
            }
            $x++;
        }
    }

}