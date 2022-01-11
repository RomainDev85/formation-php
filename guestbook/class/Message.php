<?php
namespace GuestBook;

use \DateTime;
use \DateTimeZone;

class Message {

  public $username;
  public $message;
  public $date;
  const MINIMUM_MESSAGE = 10;
  const MINIMUM_USER = 3;

  public function __construct(string $username, string $message, DateTime $date = null)
  {
    $this->username = $username;
    $this->message = $message;
    $this->date = $date ?: new DateTime();
  }

  public function isValid(): bool 
  {
    if(strlen($this->username) > self::MINIMUM_USER && strlen($this->message) > self::MINIMUM_MESSAGE){
      return true;
    }
    return false;
  }

  public function getErrors(): array
  {
    $errors = [
      'username' => null,
      'message' => null
    ];

    if(strlen($this->username) <= 3){
      $errors['username'] = "Le nom d'utilisateur doit avoir 3 caractères minimum.";
    }
    if(strlen($this->message) <= 10){
      $errors['message'] = "Le message doit contenir 10 caractères minimum.";
    }

    return $errors;
  }

  public function toJSON(): string
  {
    $data = [
      'username' => $this->username,
      'message' => $this->message,
      'date' => $this->date->getTimestamp()
    ];

    return json_encode($data);
  }

  public function toHTML(): string
  {
    $username = htmlentities($this->username);
    $message = htmlentities($this->message);
    $this->date->setTimezone(new DateTimeZone('Europe/Paris'));
    $date = $this->date->format('d/m/Y à H:i');
    return <<<HTML
      <p>
        <strong>{$username}</strong> <em>le {$date}</em><br>
        {$message}
      </p>
HTML;
  }
}