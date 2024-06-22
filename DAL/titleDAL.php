<?php
require_once dirname(__FILE__).'/../Utils/InfoDAL.php';
require_once dirname(__FILE__).'/../INFO/titleInfo.php';
class titleDAL extends InfoDAL 
{
    public function getAllArticleTitle()
    {
        $sql = "SELECT * FROM `title` WHERE `DataID` = 'article' ORDER BY `id` ASC";

        $aList = parent::query($sql);

        return $aList;
    }

    public function getAllWorkTitle() {
        $sql = "SELECT * FROM `title` WHERE `DataID` = 'work' ORDER BY `id` ASC";
        
        $aList = parent::query($sql);

        return $aList;
    }
    public function getTitlebyId($id, $DataID) {
        $sql = "SELECT * FROM `title` WHERE `id` = '".$id."' AND `DataID` = '$DataID'";
        
        $aList = parent::getOne($sql);

        if (empty(get_object_vars($aList))) return titleInfo::create();

        return $aList;
    }

}


?>