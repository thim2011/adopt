<?php
require_once dirname(__FILE__) . '/../../DAL/workDAL.php';

$id = $_POST['id'];

$aDAl1 = new workDAL();

$result = $aDAl1->deleteById($id);

if($result)
    echo "success";
else
    echo "fail";

?>