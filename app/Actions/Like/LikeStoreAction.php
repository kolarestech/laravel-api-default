<?php

namespace App\Actions\Like;

use App\Jobs\LikeStoreJob;

class LikeStoreAction
{
    //protected $job;

    function __construct()
    {
        //$this->job = $likeStoreJob;
    }

   /**
     * delete a entity by uuid
     * 
     * @param string $identity
     * 
     * @return void
     */
    function exec(array $data)
    {
        dispatch(new LikeStoreJob($data));
    }
}
