<?php 

/**
 * Gère l'API OpenWeather
 * 
 * @author Romain Aubry <fake@gmail.com>
 * 
 * @since 1.0
 * 
 * @param string API-Key
 */
class OpenWeather {

  private $apiKey;

  public function __construct(string $apikey)
  {
    $this->apiKey = $apikey;
  }
  
  /**
   * Renvoi les informations météo de la journée en cours et de la ville ajouter en parametre de la méthode.
   *
   * @param  string $city (ex: "Toulouse")
   * @return array
   */
  public function getToday(string $city): ?array
  {

    $data = $this->callAPI("weather?q={$city}");
    return [
        'temp' => $data['main']['temp'],
        'description' => $data['weather'][0]['description'],
        'date' => new DateTime()
      ];
  }
  
  /**
   * Renvoi les informations météo des 5 prochains jours de la ville ajouter en parametre de la méthode.
   *
   * @param  string $city (ex: "Toulouse")
   * @return array
   */
  public function getForecast(string $city): ?array
  {
    $data = $this->callAPI("forecast?q={$city}");
    $results = [];
    foreach($data['list'] as $day){
      $results[] = [
        'temp' => $day['main']['temp'],
        'description' => $day['weather'][0]['description'],
        'date' => new DateTime('@' . $day['dt'])
      ];
    }
    return $results;
  }
  
  /**
   * méthode privée permettant de parametrer la requete API.
   *
   * @param  string $endpoint (ex: "forecast?q={$city}" pour récuperer les infos des 5 prochains jours)
   * 
   * @throws Exception Curl a rencontrer une erreur ou ne reçoit pas de réponse a temps par l'API
   * 
   * @return array
   */
  private function callAPI(string $endpoint): ?array
  {
    $curl = curl_init("https://api.openweathermap.org/data/2.5/{$endpoint}&lang=fr&units=metric&appid={$this->apiKey}");
    curl_setopt_array($curl, [
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CAINFO => dirname(__DIR__) . DIRECTORY_SEPARATOR . "cert.cer",
      CURLOPT_TIMEOUT_MS => 1000
    ]);
    $data = curl_exec($curl);
    if($data === false){
      $error = curl_error($curl);
      curl_close($curl);
      throw new Exception($error);
    }
    if(curl_getinfo($curl, CURLINFO_HTTP_CODE !== 200)){
      throw new Exception($data);
    }
    curl_close($curl);
    return json_decode($data, true);
  }
}