<?php

require_once dirname(__FILE__).'/../Utils/InfoDAL.php';

class levelDAL extends InfoDAL
{
    public function getLevel(){
        $sql = "SELECT * FROM `level`";
        $aList = parent::query($sql);
        return $aList;
    }
}
?>