<?php
namespace App\Services\Creators;

use App\Services\Traits\ConsumeExternalService;
use Exception;
use Illuminate\Support\Facades\Http;

class CreatorShowService
{
    use ConsumeExternalService;

    protected $url;
    protected $token;

    function __construct()
    {
        $this->url = config('services.service_creators.url');
        $this->token = config('services.service_creators.token');
    }

    function exec(string $creatorIdentify)
    {
        //dd(config('services.service_creators.url')."/creators/");
        try {

            $response = $this->request('get', "/creators/{$creatorIdentify}");

            return [
                'name' => "text"
            ];
        } catch(Exception $e) {
            dd($e->getMessage());
        }

    }
}
