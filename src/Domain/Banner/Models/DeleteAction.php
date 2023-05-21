<?php

namespace Domain\Banner\Actions;

use Domain\Banner\BannerManager;

class DeleteAction {
    protected BannerManager $manager;

    public function __construct(BannerManager $manager)
    {
        $this->manager = $manager;
    }

    public function run($id)
    {
        try {
            return $this->manager->delete($id);
        }
        catch (Exception $exception) {
            throw new Exception("Error not deleted");
        }
    }
}
