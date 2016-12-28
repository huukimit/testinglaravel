<?php
/**
 * Created by PhpStorm.
 * User: huukimit
 * Date: 26/12/16
 * Time: 11:01 PM
 */

namespace App\Models;


class Alert
{
    /**
     * @var string
     */
    private $type;
    
    /**
     * @var string
     */
    private $message;
    
    /**
     * Alert constructor.
     *
     * @param        $message
     * @param string $type
     */
    public function __construct($message, $type = 'success')
    {
        $this->message = $message;
        $this->type    = $type;
    }
    
    public function getType()
    {
        return $this->type;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
}