<?php
require_once dirname(__FILE__) . '/../../DAL/usersDAL.php';

$id = $_POST['id'];

$aDAl1 = new usersDAL();

$result = $aDAl1->deleteById($id);

if($result)
    echo "success";
else
    echo "fail";

?>