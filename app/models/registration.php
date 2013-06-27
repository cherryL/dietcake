<?php
class Registration extends AppModel
{
    public static function newAccount($account)
    {
        $data = array(
            'firstname' => $account['firstname'],
            'lastname' => $account['lastname'],
            'username' => $account['username'],
            'password' => $account['password']
        );

        $db = DB::conn();
        $db->insert('accounts', $data);
    }

    public static function login($account)
    {
        $db = DB::conn();
        $row = $db->row('SELECT id FROM accounts WHERE username = ? AND password = md5(?)',
            array($account['username'], $account['password']));

        if(!$row){
            $row[] = null;
        }

        return new self($row);
    }
}