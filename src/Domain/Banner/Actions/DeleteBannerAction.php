<?php

namespace Domain\Banner\Actions;

use Domain\Banner\BannerRepository;
use Exception;

class DeleteBannerAction
{
    protected BannerRepository $repository;

    public function __construct(BannerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->delete($data);
        } catch (Exception $exception) {
            throw new Exception("Error not deleted " . $exception->getMessage());
        }
    }
}
