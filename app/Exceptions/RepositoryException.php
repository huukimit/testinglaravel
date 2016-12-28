<?php
/**
 * Created by PhpStorm.
 * User: FRAMGIA\nguyen.huu.kim
 * Date: 28/12/2016
 * Time: 08:35
 */

namespace App\Exceptions;


class RepositoryException extends \Exception
{
    public function __construct($message = "", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}