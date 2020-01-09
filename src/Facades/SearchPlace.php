<?php

namespace Choirool\SearchPlace\Facades;

use Illuminate\Support\Facades\Facade;

class SearchPlace extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'search.place';
    }
}
