<?php
require_once dirname(__FILE__).'/../../DAL/usersDAL.php';

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$aDAl1 = new usersDAL();

$result = $aDAl1->createMember($fullname, $email, $username, $password);

if ($result) 
{
    $data = array("status" => "success");
    echo json_encode($data);
    exit();
} 
else 
{
    $data = array("status" => "error");
    echo json_encode($data);
    exit();
}
?>