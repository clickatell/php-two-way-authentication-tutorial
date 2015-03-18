<?php
/**
 * File Authentication.php for two-way-authentication-tutorial
 *
 * @category two-way-authentication-tutorial
 * @package  Clickatell
 * @author   Zachie du Bruyn <zachie.dubruyn@clickatell.com>
 */

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
     * Authenticate
     *
     * @param string $username
     * @param string $password
     *
     * @return bool|string
     */
    public function Authenticate($username, $password) {
        if ($username == "admin" && $password == "password") {
            return '279991231234';
        }
        else
        {
            return false;
        }
    }
}