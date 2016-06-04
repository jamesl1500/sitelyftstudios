<?php

/* 
 * uVibe.com , Copyright 2014 All rights Reserved
 * @author James Latten
 * @desc uVibe file
 * This file is not to be givin to anyone else
 */

class Session
{

    public static function start()
    {
        session_start();
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
        return true;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function destroy()
    {
        if (isset($_SESSION)) {
            unset($_SESSION);

            session_destroy();
            //header('location: ' . APP_URL);
        }
    }
}
