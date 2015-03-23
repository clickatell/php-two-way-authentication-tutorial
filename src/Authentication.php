<?php
/**
 * File Authentication.php for two-way-authentication-tutorial
 *
 * @category two-way-authentication-tutorial
 * @package  Clickatell
 * @author   Zachie du Bruyn <zachie.dubruyn@clickatell.com>
 */

use Clickatell\Api\ClickatellHttp;
use Clickatell\Clickatell;

/**
 * Class Authentication
 *
 * @category two-way-authentication-tutorial
 * @package  Clickatell
 * @author   Zachie du Bruyn <zachie.dubruyn@clickatell.com>
 */
class Authentication 
{
    /**
     * @type Clickatell
     */
    private $clickatell = null;

    /**
     * @param Clickatell $clickatell
     */
    public function __construct(Clickatell $clickatell)
    {
        $this->clickatell = $clickatell;
    }

    /**
     * Authenticate
     *
     * @param string $username
     * @param string $password
     *
     * @return bool|string
     */
    public function authenticate($username, $password) {
        if ($username == "admin" && $password == "password") {
            return '279991231234';
        }
        else
        {
            return false;
        }
    }

    /**
     * send Pin
     *
     * @param $mobile
     *
     * @return bool
     */
    public function sendPin($mobile) {
        // generate a pin
        $pin = substr(md5($mobile . time()),0, 5);

        $_SESSION['pin'] = $pin;

        // Send text message (SMS)
        $response = $this->getClickatell()->sendMessage(array($mobile), "Pin: $pin");

        // We only sent 1 message - need only the first result
        $response = current($response);

        if ($response->errorCode > 0)
        {
            return false;
        }

        return true;
    }

    /**
     * check Pin
     *
     * @param string $pin
     *
     * @return bool
     */
    public function checkPin($pin)
    {
        return ($pin == $_SERVER['pin']);
    }

    /**
     * Get Clickatell client
     *
     * @return ClickatellHttp
     */
    public function getClickatell()
    {
        return $this->clickatell;
    }


}