<?php

class titleInfo
{
    private $title;

    private function __construct()
    {
        $this->title = new stdClass();
        $this->title->id = 0;
        $this->category = '';
        $this->DataID = '';
    }

    public function __get($key)
    {
        return $this->title->$key;
    }

    public function __set($key, $value)
    {
        $this->title->$key = $value;
    }

    public static function create()
    {
        return new self();
    }

    public function toArray()
    {
        return (array) $this->title;
    }
}

?>