<?php
/**
 * Created by PhpStorm.
 * User: huukimit
 * Date: 26/12/16
 * Time: 10:57 PM
 */

/**
 * Add alert into session to display web notification
 *
 * @param \Illuminate\Http\Request $request
 * @param                          $message
 * @param string                   $type
 */
function alert(\Illuminate\Http\Request &$request, $message, $type = 'success')
{
    $alert = new \App\Models\Alert($message, $type);
    $request->session()->flash(FLASH_MESSAGE, $alert);
}