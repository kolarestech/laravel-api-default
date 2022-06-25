<?php

namespace App\Repositories;

use App\Models\Like;
use Illuminate\Support\Facades\Cache;

class LikeRepository
{
    /**
     * model instance
     *
     * @var $model
     */
    protected $model;

    /**
     * model instance
     *
     * @var $model
     */
    protected $creatorIndexService;

    /**
     * cache module
     *
     * @var const CACHE_MODULE
     */
    const CACHE_MODULE = 'likes';

    /**
     * Construct
     *
     * @param Like $model
     * @param CreatorService $creatorService
     *
     * @return void
     */
    function __construct(
        Like $model,
        // CreatorShowService $creatorShowService
        )
    {
        $this->model = $model;
        // $this->creatorShowService = $creatorShowService;
    }

    /**
     * insert new instance os this object on database
     *
     * @param array $data
     *
     * @return object $model
     */
    public function store(array $data)
    {
        Cache::forget(self::CACHE_MODULE);

        $model = $this->model->create($data);

        return $model;
    }

    /**
     * get one instance of this object and its relationships
     *
     * @param string $identify
     *
     * @return object $model
     */
    public function getByIdentify(string $identify)
    {
        return Cache::rememberForever(self::CACHE_MODULE.$identify, function () use ($identify) {
            return $this->model->where('uuid', $identify)->firstOrFail();
        });
    }

    /**
     * Delete a instance of this object
     *
     * @param string identify
     *
     * @return object $model
     */
    public function delete(string $indetify)
    {
        $model = $this->getByIdentify($indetify);

        $model->delete();

        Cache::forget(self::CACHE_MODULE.$indetify);
        Cache::forget(self::CACHE_MODULE);
    }
}
