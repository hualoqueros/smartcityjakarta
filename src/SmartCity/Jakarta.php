<?php
namespace SmartCity;

use \GuzzleHttp\Client as Client;

class Jakarta{

    private $token;
    static $_BASE_URL = "http://api.jakarta.go.id/v1";
    private $client;
    static $_AMBULANCE = "/emergency/ambulance";
    static $_RW = "/rw";

    /**
     * Create a new Skeleton Instance
     */
    public function __construct($token)
    {
        $this->token = $token;
        $this->client =  new Client;
    }

    public function getAmbulance()
    {
        $endpoint = self::$_BASE_URL . self::$_AMBULANCE;
        $res = $this->client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => $this->token
            ]
        ]);
        return $res->getBody();
    }

    public function getRW($page = 1)
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
}