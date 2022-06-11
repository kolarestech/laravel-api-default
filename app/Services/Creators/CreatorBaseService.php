<?php
namespace App\Services\Creators;

class CreatorBaseService
{
    public $url;
    public $token;
    public $enpoint;

    function __construct()
    {
        $this->url = config('services.service_creators.url');
        $this->token = config('services.service_creators.secret');
        $this->endpoint = 'creators';
    }
}
