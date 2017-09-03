<?php

namespace Cookiesoft\Presenters;

use Cookiesoft\Transformers\BillpayTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BillpayPresenter
 *
 * @package namespace Cookiesoft\Presenters;
 */
class BillpayPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BillpayTransformer();
    }
}
