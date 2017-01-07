<?php
    define('IN_PHPBB', true);
    $phpbb_root_path = './index/forum/';     //Path to forum
    $phpEx = substr(strrchr(__FILE__, '.'), 1);
    include($phpbb_root_path . 'common.' . $phpEx);
     
    // Start session management
    $user->session_begin();
    $auth->acl($user->data);
    $user->setup('ucp');

    if($user->data['is_registered'])
    {
        //User is already logged in to phpBB
        trigger_error('You are already logged in');
    }
    else
    {
        $username = request_var('username', '', true);
        $password = request_var('password', '', true);
        $autologin = (!empty($_POST['autologin'])) ? true : false;

        $result = $auth->login($username, $password, $autologin);

        if ($result['status'] == LOGIN_SUCCESS)
        {
            //User was successfully logged into phpBB, do some redirection, more verification, etc...
            //  header("Location: index.php");
            $redirect = reapply_sid('index.php');
            meta_refresh(0, $redirect);
            trigger_error('LOGIN_REDIRECT');
        }
        else
        {
            //User's login failed
            // header("Location: error2.php");
            $redirect = reapply_sid('error.php');
            meta_refresh(0, $redirect);
            trigger_error('Login Failed');
        }
    }
?>