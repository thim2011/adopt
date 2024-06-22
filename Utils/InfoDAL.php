<?php
require_once dirname(__FILE__).'/../Utils/DBConnect.php';
class InfoDAL
{
    private $link = null;

    public function __construct() 
    {
        $this->link = DBConnect::getInstance()->getConnection();
    }

    public function query($sql)
    {
        $result = mysqli_query($this->link, $sql);

        $alist = array();
        while ($row = mysqli_fetch_object($result)) {
            $aInfo = new stdClass();
            foreach ($row as $key => $value) {
                $aInfo->$key = $value;
            }
            $alist[] = $aInfo;
        }
        return $alist;
    }

    public function getOne($sql)
    {
        $result = mysqli_query($this->link, $sql);

        $aInfo = new stdClass();
        while ($row = mysqli_fetch_object($result)) {
            foreach ($row as $key => $value) {
                $aInfo->$key = $value;
            }
        }

        return $aInfo;
    }

    public function insert($sql)
    {
        $result = mysqli_query($this->link, $sql);

        return $result;
    }

    public function update($sql)
    {
        $result = mysqli_query($this->link, $sql);

        return $result;
    }

    public function delete($sql)
    {
        $result = mysqli_query($this->link, $sql);

        if ($result) return true;
    }

    public function getContentTxt($fileName, $class)
    {
        if($fileName)
        {
            $Path = '../_uploads/' . $class . '/Content/';

            $filePath = $Path . $fileName;
    
            return file_get_contents($filePath);
        }

        return '';
    }

    public function getImageFile($fileName, $class)
    {
        $Path = '../_uploads/' . $class . '/Image/';

        $filePath = $Path . $fileName;

        if (file_exists($filePath)) return $filePath;

        return '';
    }

    public function getVideoFile($fileName, $class)
    {
        $Path = '../_uploads/' . $class . '/Video/';

        $filePath = $Path . $fileName;

        if (file_exists($filePath)) return $filePath;

        return '';
    }
}

?>