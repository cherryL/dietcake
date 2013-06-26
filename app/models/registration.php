<?php
class Registration extends AppModel
{
    public static function newAccount( $account)
    {
        $db = DB::conn();
        $db->query('INSERT INTO accounts SET firstname = ?, lastname = ?, username = ?, password = md5(?)',
            array($account['firstname'], $account['lastname'], $account['username'], $account['password']));
    }
}