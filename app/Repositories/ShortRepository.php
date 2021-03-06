<?php

namespace App\Repositories;

use App\Models\Short;
use App\Services\Creators\CreatorShowService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class ShortRepository
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
    const CACHE_MODULE = 'shorts';

    /**
     * Construct
     *
     * @param Short $model
     * @param CreatorService $creatorService
     *
     * @return void
     */
    function __construct(
        Short $model,
        CreatorShowService $creatorShowService
        )
    {
        $this->model = $model;
        $this->creatorShowService = $creatorShowService;
    }

    /**
     * filter registers os this object model
     *
     * @param array $filters
     * @param int $page
     *
     * @return Collection $data
     */
    public function getAll(array $filters, int $page)
    {
        return Cache::rememberForever(self::CACHE_MODULE, function () use ($page, $filters) {
            $query = $this->model->with('likes')->simplePaginate($page);

            $query->each(function($data) {
                $data->creator = $this->creatorShowService->exec($data->creator_identify);
            });

            return $query;
        });
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
        //return Cache::rememberForever(self::CACHE_MODULE.$identify, function () use ($identify) {
            return $this->model->where('uuid', $identify)->firstOrFail();
        //});
    }

    /**
     * Update a instance of this object
     *
     * @param array $data
     * @param string identify
     *
     * @return object $model
     */
    public function update(array $data, string $identify)
    {
        $model = $this->getByIdentify($identify);

        $model->update($data);

        Cache::forget(self::CACHE_MODULE);
        Cache::forget(self::CACHE_MODULE.$identify);

        return $model;
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
