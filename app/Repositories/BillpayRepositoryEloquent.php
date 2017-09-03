<?php

namespace Cookiesoft\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Cookiesoft\Repositories\BillpayRepository;
use Cookiesoft\Models\Billpay;
use Cookiesoft\Validators\BillpayValidator;

/**
 * Class BillpayRepositoryEloquent
 * @package namespace Cookiesoft\Repositories;
 */
class BillpayRepositoryEloquent extends BaseRepository implements BillpayRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Billpay::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function applyMultitenancy()
    {
        Billpay::clearBootedModels();
    }
}
