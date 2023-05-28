<?php

namespace Domain\Banner\Actions;

use Domain\Banner\BannerRepository;

class SaveBannerAction {
    protected BannerRepository $repository;

    public function __construct(BannerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->save($data);
        }
        catch (Exception $exception) {
            throw new Exception("Error not saved");
        }
    }
}
