<?php

namespace Cookiesoft\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BillpayRepository
 * @package namespace Cookiesoft\Repositories;
 */
interface BillpayRepository extends RepositoryInterface, RepositoryMultitenancyInterface
{
    public function calculateTotal();
}
