<?php
require_once 'Message.php';
class GuestBook {
  
  public $file;

  public function __construct(string $file)
  {
    $this->file = $file;
  }

  public function addMessage(Message $message): void
  {
    if($message->isValid()){
      file_put_contents($this->file, $message->toJSON() . PHP_EOL, FILE_APPEND);
    }
  }

  public function getMessages(): array
  {
    $content = trim(file_get_contents($this->file));
    $lines = explode(PHP_EOL, $content);
    $messages = [];
    foreach($lines as $line){
      $data = json_decode($line, true);
      $messages[] = new Message($data['username'], $data['message'], new DateTime("@" . $data['date']));
    }
    return $messages;
  }

}