<?php

namespace App\Http\GraphQL\Cart\Queries;

use Domain\Setting\SettingRepository;

final class GetDeliveryCosts
{
    protected SettingRepository $repository;

    public function __construct(SettingRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $costs = $this->repository->findByKey('delivery_cost');
        return $costs;
    }
}
