<?php

namespace Fabpl\ModelStatus\Exceptions;

use Exception;

class InvalidStatusException extends Exception
{
    /**
     * Create InvalidStatusException with custom message.
     *
     * @param string $status
     * @return InvalidStatusException
     */
    public static function factory(string $status): InvalidStatusException
    {
        return new self(sprintf(__('Invalid status "%s"'), $status));
    }
}
