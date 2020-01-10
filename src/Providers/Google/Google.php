<?php

namespace Choirool\SearchPlace\Providers\Google;

use GuzzleHttp\Client;
use Choirool\SearchPlace\Providers\Google\Formatter;

class Google
{
    protected $http;
    protected $formatter;

    public function __construct()
    {
        $this->http = new Client;
        $this->formatter = new Formatter;
    }

    protected function get($keywords)
    {
        $response = $this->http->get('https://maps.googleapis.com/maps/api/place/findplacefromtext/json', [
            'query' => [
                'inputtype' => 'textquery',
                'fields' => config('search-place.options.fields'),
                'key' => config('search-place.api_key'),
                'input' => $keywords,
            ]
        ]);

        $data = json_decode((string) $response->getBody(), true);

        return $this->formatter
                    ->setData($data)
                    ->format();
    }

    public function search($keywords = '')
    {
        return $this->get($keywords);
    }
}
