<?php

namespace App\Repositories;

use App\Models\Short;
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
     * cache module
     * 
     * @var const CACHE_MODULE
     */
    const CACHE_MODULE = 'shorts';

    function __construct(Short $model)
    {
        $this->model = $model;
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
        return Cache::rememberForever('shorts', function () use ($page, $filters) {
            return $this->model->paginate($page);
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
        Cache::forget('shorts');

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
        return Cache::rememberForever('shorts'.$identify, function () use ($identify) {
            return $this->model->where('uuid', $identify)->firstOrFail();
        });
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

        Cache::forget('shorts');
        Cache::forget('shorts'.$identify);

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

        Cache::forget('shorts'.$indetify);
        Cache::forget('shorts');
    }
}
