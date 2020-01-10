<?php

namespace Choirool\SearchPlace\Providers\Google;

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

        foreach ($this->data['candidates'] as $candidate) {
            $results[] = [
                'name' => $candidate['name'],
                'address' => $candidate['formatted_address'],
                'geometry' => [
                    'lat' => $candidate['geometry']['location']['lat'],
                    'lng' => $candidate['geometry']['location']['lng'],
                ],
            ];
        }
        
        return $results;
    }
}
