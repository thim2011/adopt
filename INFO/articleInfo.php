<?php

class articleInfo
{
    private $article;

    private function __construct()
    {
        $this->article = new stdClass();
        $this->article->id = 0;
        $this->article->userNo = 0;
        $this->article->title = '';
        $this->article->category = '';
        $this->article->content = '';
        $this->article->publish = 0;
        $this->article->create_date = '';
        $this->article->modify_date = '';
        $this->article->image = '';
        $this->article->viewCX ='';
    }

    public function __get($key)
    {
        return $this->article->$key;
    }

    public function __set($key, $value)
    {
        $this->article->$key = $value;
    }

    public static function create()
    {
        return new self();
    }

    public function toArray()
    {
        return (array) $this->article;
    }
}

?>