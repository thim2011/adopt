<?php 
require_once dirname(__FILE__).'/../Utils/InfoDAL.php';
require_once dirname(__FILE__).'/../INFO/articleInfo.php';
class articleDAL extends InfoDAL 
{

    public function getArticleByPage($category, $pageStart=0, $pageSize)
    {
        if($category)
            $temp = " WHERE `category` = '".$category."'";
            
        else
            $temp = "";

        $sql = "SELECT * FROM `article`".$temp."
                ORDER BY `id` DESC
                LIMIT ".$pageStart.",".$pageSize.";";
        
        $aList = parent::query($sql);

        return $aList;
    }

    public function getOneById($id)
    {
        $sql = "SELECT * FROM `article` WHERE `id` = '$id';";

        $aList = $this->getOne($sql);

        if (empty(get_object_vars($aList))) return articleInfo::create();

        return $aList;
    }
    
    public function getPageCount($category)
    {
        $sql = "SELECT COUNT(*) FROM `article`
                WHERE `publish` = 1";

        if($category)
            $sql .= " AND `category` = '".$category."'";
        
        $aList = parent::getOne($sql);

        return isset($aList->{'COUNT(*)'}) ? $aList->{'COUNT(*)'} : 0;
    }

    public function save($aObj)
    {
    
        if ($aObj->id) {
            $sql = "UPDATE `article` SET `userNo` = '" . $aObj->userNo . "', `title` = '" . $aObj->title . "', `category` = '" . $aObj->category . "', `content` = '" . $aObj->content . "', `modify_date` = '" . $aObj->modify_date . "'";
            
            if ($aObj->image) $sql .= ", `image` = '" . $aObj->image . "'";

            $sql .= ", `publish` = " . ($aObj->save == 1 ? "0" : "1");
    
            $sql .= " WHERE `id` = '" . $aObj->id . "'";
        }
        else {
            $sql = "INSERT INTO `article` (`userNo`, `title`, `category`, `content`, `create_date`, `image`, `publish`) VALUES 
                    ('{$aObj->userNo}', '{$aObj->title}', '{$aObj->category}', '{$aObj->content}', '{$aObj->create_date}', '{$aObj->image}', " . ($aObj->save ? 0 : 1) . ")";
        }
    
        $result = parent::insert($sql);
    
        return $result;
    }
    

    public function getLastKey()
    {
        $sql = "SELECT MAX(`id`) AS id FROM `article`;";

        $result = parent::getOne($sql);

        return $result->id + 1;
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM `article` WHERE `id` = '".$id."';";

        $result = parent::delete($sql);

        return $result;
    }

    public function addView($id)
    {
        $sql = "UPDATE `article` SET `viewCX` = `viewCX` + 1 WHERE `id` = '".$id."';";

        $result = parent::insert($sql);

        return $result;
    }
}
?>
