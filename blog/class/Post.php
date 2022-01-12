<?php
class Post {

  public int $id;
  public string $name;
  public string $content;
  public $created_at;

  public function __construct()
  {
    if(is_int($this->created_at)){
      $this->created_at = new DateTime('@' . $this->created_at);
    }
    if(is_null($this->created_at)){
      $this->created_at = new DateTime();
    }
  }

  public function getExcerpt(): string
  {
    return substr($this->content, 0, 150);
  }
}