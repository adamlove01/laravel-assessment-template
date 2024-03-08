<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class StarWarsController extends Controller
{
  /**
   * @param Request $request
   * @return \Illuminate\View\View
   */
    public function search(Request $request): \Illuminate\View\View
    {
        // The API endpoint for the Star Wars API
        $url = 'https://swapi.info/api/people';
        $q = $request->input('search');
        if ($q) {
            $url .= '?search=' . urlencode($q);
        }

        $client = new Client();

        // Make a GET request to the API
        $response = $client->get($url);
        $data = json_decode($response->getBody());

        // Filter the data based on the `name` key
        if ($q) {
            $filteredData = [];
            foreach ($data as $item) {
                if (Str::contains(strtolower($item->name), strtolower($q))) {
                    $filteredData[] = $item;
                }
            }
            $data = $filteredData;
        }

        // Get additional data for each item if the value is an endpoint
        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                // Some keys have values that are endpoints 
                if (in_array($key, ['homeworld', 'films', 'species', 'vehicles', 'starships']) && !empty($value)) {
                    // Get the data from the endpoint
                    if (!is_array($value)) {
                        $res = $client->get($value);
                        $dat = json_decode($res->getBody());
                        $item->$key = $dat->name; 
                    } else {
                        $list = [];
                        // Some values are arrays of endpoints
                        foreach ($value as $subKey => $subVal) {
                            $res = $client->get($subVal);
                            $dat = json_decode($res->getBody());
                            // Films have titles not names
                            $nameKey = empty($dat->name) ? 'title' : 'name';
                            $list[] = $dat->$nameKey; 
                        }
                        $item->$key = $list;
                    }
                }
            }
        }

        return view('starwars_search', ['people' => $data]);
    }
}