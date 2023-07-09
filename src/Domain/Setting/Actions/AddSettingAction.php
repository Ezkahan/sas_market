<?php

namespace Domain\Setting\Actions;

use Domain\Setting\SettingRepository;
use Exception;

class AddSettingAction
{
    protected SettingRepository $repository;

    public function __construct(SettingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($data)
    {
        try {
            return $this->repository->add($data);
        } catch (Exception $exception) {
            throw new Exception("Error not added " . $exception->getMessage());
        }
    }
}
