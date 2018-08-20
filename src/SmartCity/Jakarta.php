<?php
namespace SmartCity;

use \GuzzleHttp\Client as Client;
use SmartCity\Constant;
class Jakarta{

    private $token;
    private $client;
    use Constant;

    /**
     * Create a new Skeleton Instance
     */
    public function __construct($token)
    {
        $this->token = $token;
        $this->client =  new Client;
    }
    
    /**
     * Get Ambulance data
     *
     * @return string
     */
    public function getAmbulance(): string
    {
        $endpoint = self::$_BASE_URL . self::$_AMBULANCE;
        $res = $this->client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => $this->token
            ]
        ]);
        return $res->getBody();
    }

    /**
     * get RW data
     *
     * @param integer $page
     * @return string
     */
    public function getRW($page = 1): string
    {
        $options  = http_build_query([ "page" => $page ]);
        $endpoint = self::$_BASE_URL . self::$_RW . "?" . $options;

        $res = $this->client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => $this->token
            ]
        ]);
        return $res->getBody();
    }
    
    /**
     * Tracking Busway
     *
     * @param string $busCode filled this when search spesific bus code
     * @return void
     */
    public function getBusway( $busCode = "" ){
        $endpoint = self::$_BUSWAY;

        $res = $this->client->request('GET', $endpoint);
        if ($busCode!=""){
            $busWayTracking = json_decode($res->getBody()->getContents())->buswaytracking;
            $busWay = array_filter($busWayTracking, function($arr) use (&$busCode) {
                            return $arr->buscode == $busCode;
                        });
            return json_encode($busWay);
        }
        return $res->getBody();
    }
}