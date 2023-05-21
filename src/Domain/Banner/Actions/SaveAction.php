<?php

namespace Domain\Banner\Actions;

use Domain\Banner\BannerManager;

class SaveAction {
    protected BannerManager $manager;

    public function __construct(BannerManager $manager)
    {
        $this->manager = $manager;
    }

    public function run(array $data)
    {
        try {
            return $this->manager->save($data);
        }
        catch (Exception $exception) {
            throw new Exception("Error not saved");
        }
    }
}
