<?php

namespace Choirool\SearchPlace\Providers;

use GuzzleHttp\Client;

class Google
{
    protected $http;

    public function __construct()
    {
        $this->http = new Client;
    }

    public function search($keywords = '')
    {
        $response = $this->http->get('https://maps.googleapis.com/maps/api/place/findplacefromtext/json', [
            'query' => [
                'inputtype' => 'textquery',
                'fields' => config('search-place.options.fields'),
                'key' => config('search-place.api_key'),
                'input' => $keywords,
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}
