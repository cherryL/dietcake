<?php

session_start();

class RegistrationController extends AppController
{
    public function createAccount()
    {
        $message = null;

        if (isset($_POST['createAccount'])) {
            $account_info['username'] = Param::get('username');
            $account_info['password'] = Param::get('password');
            $account_info['firstname'] = Param::get('firstname');
            $account_info['lastname'] = Param::get('lastname');

            if (empty($account_info['username']) || empty($account_info['password']) || empty($account_info['firstname']) || empty($account_info['lastname'])) {
                $message['error'] = "input valid information";
            } else {
                $account = new Registration();
                $account->newAccount($account_info);
                $message['success'] = "successfully created an account";
            }
        }

        $this->set(get_defined_vars());
    }

    public function loginAccount()
    {
        $message = "";

        if(isset($_SESSION['user_id'])){
            header('location: /thread/index');
        }

        if (isset($_POST['login'])) {
            $user_info['username'] = Param::get('username');
            $user_info['password'] = Param::get('password');

            if (empty($user_info['username']) || empty($user_info['password'])) {
                $message['error'] = "input valid account information";
            } else {
                $account = new Registration();
                $user = $account->login($user_info);

                if (is_null($user->id)) {
                    $message['error'] = "Account not registered";
                } else {
                    $_SESSION['user_id'] = $user->id;
                    $_SESSION['user_name'] = $user_info['username'];

                    header('location: /thread/index');
                }
            }
        }

        $this->set(get_defined_vars());
    }
}