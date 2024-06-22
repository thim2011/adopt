<?php
require_once dirname(__FILE__).'/../Utils/InfoDAL.php';
class usersDAL extends InfoDAL
{
    public function createMember($fullname, $email, $username, $password) 
    {

        if ($this->checkMemberExistence($username))
        {
            $sql = "INSERT INTO `users` (`fullname`, `email`, `username`, `password`, `level`) VALUES ('{$fullname}', '{$email}', '{$username}', '{$password}',2);";

            $result = parent::insert($sql);

            if ($result)
                return true;

            return false;
        }

        return false;
    }
    public function checkMemberExistence($username)
    {
        $sql = "SELECT COUNT(*) AS `count` FROM `users` WHERE `username` = '".$username."';";

        $checkQuery = parent::query($sql);
    
        if ($checkQuery && isset($checkQuery[0]->count)) 
        {
            if ($checkQuery[0]->count > 0)
                return false;
        }
    
        return true;
    }
    public function login($username, $password) 
    {
        $sql = "SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".$password."';";

        $aList = parent::getOne($sql);
        
        if (empty($aList)) return false;
        
        return $aList;
    }
    
    public function getNameById($id)
    {
        $SQL = "SELECT fullname FROM `users` WHERE `id` = '".$id."';";

        $aList = parent::getOne($SQL);

        return $aList;
    }

    public function getUserByPage($type, $pageStart, $pageSize){
        if($type==0)
            $temp = "";
        else
            $temp = " WHERE `level` = '".$type."'";

        $SQL = "SELECT * FROM `users`".$temp." LIMIT ".$pageStart.",".$pageSize.";";

        $aList = parent::query($SQL);

        return $aList;
    }

    public function getUserTotalCount($type){
        if($type==0)
            $temp='';
        else 
            $temp = " WHERE `level` = '".$type."'";
            

        $SQL = "SELECT COUNT(*) FROM `users`".$temp;

        $aList = parent::getOne($SQL);

        return isset($aList->{'COUNT(*)'}) ? $aList->{'COUNT(*)'} : 0;
    }

    public function save($aInfo1)
    {
        // $SQL = "INSERT INTO `users` (`fullname`, `email`, `username`, `password`, `level`) VALUES ('{$aInfo1->fullname}', '{$aInfo1->email}', '{$aInfo1->username}', '{$aInfo1->password}', '{$aInfo1->level}');";
        $SQL = "UPDATE `users` SET 
                `fullname` = '{$aInfo1->fullname}', 
                `email` = '{$aInfo1->email}', 
                `username` = '{$aInfo1->username}', 
                `password` = '{$aInfo1->password}',
                `level` = '{$aInfo1->level}'
                WHERE `id` = '{$aInfo1->id}';";    

        $result = parent::update($SQL);

        if ($result)
            return true;

        return false;
    }
    public function deleteById($id)
    {
        $sql = "DELETE FROM `users` WHERE `id` = '".$id."';";

        $result = parent::delete($sql);

        return $result;
    }

    public function getOnebyID($id){
        $SQL = "SELECT * FROM `users` WHERE `id` = '".$id."';";

        $aList = parent::getOne($SQL);

        return $aList;
    }
}
?>