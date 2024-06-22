<?php
require_once dirname(__FILE__) . '/../Utils/InfoDAL.php';
require_once dirname(__FILE__) . '/../INFO/workInfo.php';
class workDAL extends InfoDAL
{
    public function getWorkByPage($category, $pageStart = 0, $pageSize)
    {
        if ($category)
            $temp = " WHERE `category` = '" . $category . "'";
        else
            $temp = "";

        $sql = "SELECT * FROM `work`" . $temp . "
                ORDER BY `id` DESC
                LIMIT " . $pageStart . "," . $pageSize . ";";

        $aList = parent::query($sql);

        return $aList;
    }

    public function getOnebyID($id)
    {
        $sql = "SELECT * FROM `work` WHERE `id` = '" . $id . "'";

        $aList = $this->getOne($sql);

        if (empty(get_object_vars($aList)))
            return workInfo::create();

        return $aList;
    }
    public function getPageCount($category)
    {
        $sql = "SELECT COUNT(*) FROM `work`";

        if ($category)
            $sql .= " WHERE `category` = '" . $category . "'";

        $aList = parent::getOne($sql);

        return isset($aList->{'COUNT(*)'}) ? $aList->{'COUNT(*)'} : 0;
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM `work` WHERE `id` = '" . $id . "'";

        $result = parent::delete($sql);

        return $result;
    }

    public function getLastKey()
    {
        $sql = "SELECT MAX(`id`) AS id FROM `work`;";

        $result = parent::getOne($sql);

        return $result->id + 1;
    }

    public function save($aObj)
    {
        if ($aObj->id) {
            $sql = "UPDATE `work` SET `userNo` = '{$aObj->userNo}', `title` = '{$aObj->title}', `category` = '{$aObj->category}', `content` = '{$aObj->content}', `modify_date` = '{$aObj->modify_date}'";
    
            if ($aObj->image) {
                $sql .= ", `image` = '{$aObj->image}'";
            }
    
            if ($aObj->video) {
                $sql .= ", `video` = '{$aObj->video}'";
            }
    
            $sql .= ", `publish` = " . ($aObj->save == 1 ? "0" : "1");
    
            $sql .= " WHERE `id` = '{$aObj->id}'";
        }
        else {
            $sql = "INSERT INTO `work` (`userNo`, `title`, `category`, `content`, `publish`, `image`, `video`, `create_date`) VALUES ('{$aObj->userNo}', '{$aObj->title}', '{$aObj->category}', '{$aObj->content}', " . ($aObj->save ? 0 : 1) . ", '{$aObj->image}', '{$aObj->video}', '{$aObj->create_date}')";
        }
    
        $result = parent::insert($sql);
    
        return $result;
    }

    public function addView($id)
    {
        $sql = "UPDATE `work` SET `viewCX` = `viewCX` + 1 WHERE `id` = '{$id}'";

        $result = parent::update($sql);

        return $result;
    }
    

}
