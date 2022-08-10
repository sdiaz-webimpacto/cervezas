<?php


class GuestController
{
    public static function getGuest($ip)
    {
        return GuestModel::getGuest($ip);
    }
}