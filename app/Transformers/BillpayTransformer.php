<?php

namespace Cookiesoft\Transformers;

use League\Fractal\TransformerAbstract;
use Cookiesoft\Models\Billpay;

/**
 * Class BillpayTransformer
 * @package namespace Cookiesoft\Transformers;
 */
class BillpayTransformer extends TransformerAbstract
{

    /**
     * Transform the \Billpay entity
     * @param \Billpay $model
     *
     * @return array
     */
    public function transform(Billpay $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
