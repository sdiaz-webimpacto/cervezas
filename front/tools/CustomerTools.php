<?php


class CustomerTools
{
    public static function encryptation($plainText)
    {
        $result = crypt($plainText, '$2a$09$santicodespecialencrypt$');
        return $result;
    }
}