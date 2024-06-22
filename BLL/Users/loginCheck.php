<?php
session_start();

require_once dirname(__FILE__).'/../../DAL/usersDAL.php';

$username = $_POST['username'];
$password = $_POST['password'];

$aDAl1 = new usersDAL();

$aInfo1 = $aDAl1->login($username, $password);

if($aInfo1!= false){
    $_SESSION['userNo'] = $aInfo1->id;
    $_SESSION['userName'] = $aInfo1->fullname;
    $_SESSION['level'] = $aInfo1->level;

    if ($aInfo1->level == 1) {
        header('Location: ../../admin/index.php');
        exit();
    } 
    elseif ($aInfo1->level == 2) {
        header('Location: ../../user/index.php?pageno=1');
        exit();
    }
    else {
        header('Location: ../../Home/login.php?message=none');
        exit();
    }
}