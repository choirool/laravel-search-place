<?php

namespace Choirool\SearchPlace;

use Choirool\SearchPlace\Providers\Google;
use Choirool\SearchPlace\Providers\Mapbox;

class SearchPlace
{
    protected $result;
    protected $service;

    public function __construct()
    {
        $this->setService();
    }

    protected function setService()
    {
        switch (config('search-place.service')) {
            case 'mapbox':
                $this->service = new Mapbox;
                break;
            default:
                $this->service = new Google;
                break;
        }
    }

    public function search($keyword = null)
    {
        return $this->service->search($keyword);
    }
}
