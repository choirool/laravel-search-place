<?php

namespace Choirool\SearchPlace\Providers;

use GuzzleHttp\Client;

class Mapbox
{
    protected $http;

    public function __construct()
    {
        $this->http = new Client;
    }

    public function search($keywords = '')
    {
        $response = $this->http->get("https://api.mapbox.com/geocoding/v5/mapbox.places/{$keywords}.json", [
            'query' => [
                'access_token' => config('search-place.api_key'),
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}
