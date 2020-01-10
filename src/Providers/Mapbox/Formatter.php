<?php

namespace Choirool\SearchPlace\Providers\Mapbox;

class Formatter
{
    protected $data;

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function format()
    {
        $results = [];

        foreach ($this->data['features'] as $features) {
            $results[] = [
                'name' => $features['place_name'],
                'address' => $features['properties']['address'],
                'geometry' => [
                    'lat' => $features['geometry']['coordinates'][0],
                    'lng' => $features['geometry']['coordinates'][1],
                ],
            ];
        }
        
        return $results;
    }
}
