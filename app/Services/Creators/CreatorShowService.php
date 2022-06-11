<?php
namespace App\Services\Creators;

use App\Services\Creators\CreatorBaseService;
use App\Services\Traits\ConsumeExternalService;
use Exception;
use Illuminate\Support\Facades\Http;

class CreatorShowService extends CreatorBaseService
{
    use ConsumeExternalService;

    function __construct()
    {
        $this->url = config('services.service_creators.url');
        $this->token = config('services.service_creators.token');
    }

    function exec(string $creatorIdentify)
    {
        try {
            $response = $this->request('get', "/creators/{$creatorIdentify}");
            //dd($response);
            return $response->json()['data'];
        } catch(Exception $e) {
            dd($e->getMessage());
        }
    }
}
