<?php

namespace Domain\Setting\Actions;

use Domain\Setting\SettingRepository;
use Exception;

class DeleteSettingAction
{
    protected SettingRepository $repository;

    public function __construct(SettingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $exception) {
            throw new Exception("Error not deleted");
        }
    }
}
