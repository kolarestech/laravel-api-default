<?php

namespace App\Actions\Like;

use App\Jobs\LikeDeleteJob;

class LikeDeleteAction
{
    protected $job;

    function __construct(LikeDeleteJob $likeDeleteJob)
    {
        $this->job = $likeDeleteJob;
    }

    /**
     * delete a entity by uuid
     * 
     * @param string $identity
     * 
     * @return void
     */
    function exec(string $identify)
    {
        $this->job->dispatch($identify);
    }
}
