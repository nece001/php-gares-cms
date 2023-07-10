<?php

namespace Nece\Gears\Cms;

use Exception;

class CmsException extends Exception
{
    public function __construct($message = "", $code = '', $previous = null)
    {
        parent::__construct($message, 0, $previous);
        $this->code = $code;
    }
}
