<?php


class GuestModel
{
    public static function getGuest($ip)
    {
        $where = 'ip = "'.$ip.'"';
        $guest = Conn::select('guest', 'id', $where);
        if(!empty($guest))
        {
            return $guest;
        }
        $id = new GuestModel();
        return $id->new($ip);
    }

    protected function new($ip)
    {
        $data = array('ip' => $ip);
        $guest = Conn::insert('guest', $data);
        $return = false;
        if($guest)
        {
            return GuestModel::getGuest($ip);
        }
        return $return;
    }
}