<?php

namespace Cookiesoft\Repositories;

use Cookiesoft\Presenters\CategoryPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Cookiesoft\Models\Category;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace Cookiesoft\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return CategoryPresenter::class;
    }

    public function applyMultitenancy()
    {
        Category::clearBootedModels();
    }
}
