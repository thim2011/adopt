<?php

class workInfo
{
    private $work;

    private function __construct()
    {
        $this->work = new stdClass();
        $this->work->id = 0;
        $this->work->userNo = 0;
        $this->work->title = '';
        $this->work->category = '';
        $this->work->content = '';
        $this->work->publish = 0;
        $this->work->image = '';
        $this->work->video = '';
        $this->work->create_date = '';
        $this->work->modify_date = '';
    }

    public function __get($key)
    {
        return $this->work->$key;
    }

    public function __set($key, $value)
    {
        $this->work->$key = $value;
    }

    public static function create()
    {
        return new self();
    }

    public function toArray()
    {
        return (array) $this->work;
    }
}

?>