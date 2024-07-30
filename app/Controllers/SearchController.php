<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SearchController extends BaseController
{
    public function index()
    {
        return view('search');
    }

    public function results()
    {
        $query = $this->request->getPost('query');
        $apiKey = env('PIXABAY_API_KEY');
        $url = "https://pixabay.com/api/?key=$apiKey&q=" . urlencode($query);

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        return view('search_results', ['results' => $data['hits']]);
    }
}
