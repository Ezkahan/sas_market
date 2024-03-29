<?php

namespace Domain\Banner\Actions;

use Domain\Banner\BannerRepository;
use Domain\Banner\DTO\BannerDTO;
use Exception;

class SaveBannerAction
{
    protected BannerRepository $repository;

    public function __construct(BannerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(BannerDTO $data)
    {
        try {
            return $this->repository->save($data);
        } catch (Exception $exception) {
            throw new Exception("Error not saved " . $exception->getMessage());
        }
    }
}
