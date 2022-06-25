<?php
namespace App\Services\Creators;

use App\Services\Creators\CreatorBaseService;
use App\Services\Traits\ConsumeExternalService;
use Exception;

class CreatorShowService extends CreatorBaseService
{
    /**
     * Traits
     */
    use ConsumeExternalService;

    /**
     * Get the short creator
     * 
     * @param string uuid $identify
     * 
     * @return object $data
     */
    function exec(string $creatorIdentify)
    {
        try {
            $response = $this->request('get', "{$this->endpoint}/{$creatorIdentify}");
            return $response->json()['data'];
        } catch(Exception $e) {
            dd($e->getMessage());
        }
    }
}
