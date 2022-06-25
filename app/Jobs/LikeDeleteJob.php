<?php

namespace App\Jobs;

use App\Repositories\LikeRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LikeDeleteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $repository;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(LikeRepository $likeRepository)
    {
        $this->repository = $likeRepository;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(string $identify)
    {
        $this->repository->delete($identify);
    }
}
