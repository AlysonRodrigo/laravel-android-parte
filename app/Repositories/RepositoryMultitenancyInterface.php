<?php
/**
 * Created by PhpStorm.
 * User: CRAS
 * Date: 03/09/2017
 * Time: 15:21
 */

namespace Cookiesoft\Repositories;


interface RepositoryMultitenancyInterface
{
    public function applyMultitenancy();
}