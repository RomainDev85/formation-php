<?php

class Form {

  public static $class = 'form-control';

  public static function checkbox (string $name, string $value = null, array $data): string {
    $attributes = '';
    if(isset($data) && array_key_exists($name, $data) && in_array($value, $data[$name])){
      $attributes = 'checked';
    };

    $class = self::$class;
  
    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $attributes class="$class">
HTML;
  }

}