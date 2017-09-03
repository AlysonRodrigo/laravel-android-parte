<?php

namespace Cookiesoft\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Cookiesoft\Repositories\UserRepository;
use Cookiesoft\Models\User;
use Cookiesoft\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent
 * @package namespace Cookiesoft\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{

    public function create(array $attributes)
    {
        $attributes['password'] = bcrypt($attributes['password']);
        return parent::create($attributes);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
