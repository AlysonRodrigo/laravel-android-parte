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

    protected $defaultIncludes = ['category'];

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
            'name'       => $model->name,
            'date_due'   => $model->date_due,
            'value'      => (float) $model->value,
            'done'       => (bool) $model->done,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeCategory(Billpay $model){
        return $this->item($model->category, new CategoryTransformer());
    }
}
