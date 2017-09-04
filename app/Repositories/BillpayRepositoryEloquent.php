<?php

namespace Cookiesoft\Repositories;

use Cookiesoft\Presenters\BillpayPresenter;
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

    public function presenter()
    {
        return BillpayPresenter::class;
    }

    public function applyMultitenancy()
    {
        Billpay::clearBootedModels();
    }

    public function calculateTotal()
    {
        $result = [
           'count' => 0,
           'count_paid' => 0,
           'total_be_paid' => 0
        ];
        $billPays = $this->skipPresenter()->all();
        $result['count'] = $billPays->count();
        foreach ($billPays as $billPay){
            $done = (bool) $billPay->done;
            if($done){
                $result['count_paid']++;
            }else{
                $value = (float) $billPay->value;
                $result['total_be_paid'] += $value;
            }

        }

        return $result;
    }
}
