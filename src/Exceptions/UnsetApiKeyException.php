<?php
namespace Choirool\SearchPlace\Exceptions;

use Exception;

class UnsetApiKeyException extends Exception
{
    public static function apiKeyNotSet()
    {
        return new static("Please set api key.");
    }
}
