<?php

namespace DenizTezcan\BolRetailerV3;

use DenizTezcan\BolRetailerV3\Entities\Commission;
use DenizTezcan\BolRetailerV3\Entities\Offer;
use DenizTezcan\BolRetailerV3\Entities\Order;
use DenizTezcan\BolRetailerV3\Http\Client;

class BolRetailerV3
{
    protected $client = null;

    public function __construct($client_id = null, $client_secret = null)
    {
        if ($this->client === null) {
            if ($client_id !== null && $client_secret !== null) {
                $this->client = new Client($client_id, $client_secret);
            } else {
                $this->client = new Client(config('bolcom-retailer-v3.api.client_id'), config('bolcom-retailer-v3.api.client_secret'));
            }
        }
        $this->client->authenticate();
    }

    public function setDemoMode(): void
    {
        $this->client->setDemoMode(true);
    }

    public function commisions(): Commission
    {
        return new Commission($this->client);
    }

    public function offers(): Offer
    {
        return new Offer($this->client);
    }

    public function orders(): Order
    {
        return new Order($this->client);
    }
}
