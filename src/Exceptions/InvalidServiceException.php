<?php
namespace Choirool\SearchPlace\Exceptions;

use Exception;

class InvalidServiceException extends Exception
{
    public static function serviceNotSupport($service)
    {
        return new static("{$service} service not supported yet.");
    }
}
