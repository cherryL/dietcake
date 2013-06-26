<?php
class RegistrationController extends AppController
{
    public function createAccount()
    {
        $message = null;

        if(isset($_POST['createAccount'])){
            $account_info['username'] = Param::get('username');
            $account_info['password'] = Param::get('password');
            $account_info['firstname'] = Param::get('firstname');
            $account_info['lastname'] = Param::get('lastname');

            if($account_info['username'] == "" || $account_info['password'] == "" || $account_info['firstname'] == "" || $account_info['lastname'] == "") {
                $message['error'] = "input valid information";
            } else {
                $account = new Registration();
                $account->newAccount($account_info);
                $message['success'] = "successfully created an account";
            }
        }

        $this->set(get_defined_vars());
    }
}