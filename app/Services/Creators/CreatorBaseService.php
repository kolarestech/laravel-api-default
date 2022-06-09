<?php
namespace App\Services;

class CreatorBaseService
{
    public $url;
    public $token;

    function __construct()
    {
        $this->url = config('services.service_creators.url');
        $this->token = config('services.service_creators.secret');
    }

    function connect()
    {

    }
}
