<?php
class Registration extends AppModel
{
    public static function newAccount($account)
    {
        $db = DB::conn();
        $db->query('INSERT INTO accounts SET firstname = ?, lastname = ?, username = ?, password = md5(?)',
            array($account['firstname'], $account['lastname'], $account['username'], $account['password']));
    }

    public static function login($account)
    {
        $db = DB::conn();
        $row = $db->row('SELECT id FROM accounts WHERE username = ? AND password = md5(?)',
            array($account['username'], $account['password']));

        if($row == FALSE){
            $row[] = null;
        }

        return new self($row);
    }
}