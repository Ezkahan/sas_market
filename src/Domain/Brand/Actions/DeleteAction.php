<?php

namespace Domain\Brand\Actions;

use Domain\Brand\BrandManager;

class DeleteAction {
    protected BrandManager $manager;

    public function __construct(BrandManager $manager)
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
