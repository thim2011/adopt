<?php
    require_once dirname(__FILE__).'/../../DAL/usersDAL.php';

    $aDAl1 = new usersDAL();

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $id = $_POST['id'];

    $user = new stdClass();
    $user->fullname = $fullname;
    $user->email = $email;
    $user->username = $username;
    $user->password = $password;
    $user->level = $level;
    $user->id = $id;

    $data = $aDAl1->save($user);
    
    echo $data;
    
?>