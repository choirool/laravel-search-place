<?php

namespace Choirool\SearchPlace;

use Choirool\SearchPlace\Providers\Google;
use Choirool\SearchPlace\Providers\Mapbox;
use Choirool\SearchPlace\Exceptions\UnsetApiKeyException;
use Choirool\SearchPlace\Exceptions\InvalidServiceException;

class SearchPlace
{
    protected $result;
    protected $service;
    protected $availableServices = [
        'mapbox',
        'google'
    ];

    public function __construct()
    {
        $this->setService();
    }

    protected function checkSerive()
    {
        $service = config('search-place.service');

        if (!in_array($service, $this->availableServices)) {
            throw InvalidServiceException::serviceNotSupport($service);
        }
    }

    protected function checkAiKey()
    {
        if(! config('search-place.api_key')) {
            throw UnsetApiKeyException::apiKeyNotSet();
        }
    }

    protected function setService()
    {
        $this->checkSerive();

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
        $this->checkAiKey();
        return $this->service->search($keyword);
    }
}
