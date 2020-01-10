<?php

namespace Choirool\SearchPlace\Providers\Mapbox;

use GuzzleHttp\Client;
use Choirool\SearchPlace\Providers\Mapbox\Formatter;

class Mapbox
{
    protected $http;
    protected $formatter;

    public function __construct()
    {
        $this->http = new Client;
        $this->formatter = new Formatter;
    }

    public function get($keywords)
    {
        $response = $this->http->get("https://api.mapbox.com/geocoding/v5/mapbox.places/{$keywords}.json", [
            'query' => [
                'access_token' => config('search-place.api_key'),
            ]
        ]);

        $data = json_decode((string) $response->getBody(), true);
        
        return $this->formatter
                    ->setData($data)
                    ->format();
    }

    public function search($keywords = '') {
        return $this->get($keywords);
    }
}
