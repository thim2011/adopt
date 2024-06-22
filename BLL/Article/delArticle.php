<?php
require_once dirname(__FILE__) . '/../../DAL/ArticleDAL.php';

$id = $_POST['id'];

$aDAl1 = new ArticleDAL();

$result = $aDAl1->deleteById($id);

if($result)
    echo "success";
else
    echo "fail";

?>